<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;
use App\Models\User;
use App\Models\Role;
use App\Models\UserPermissionModel;
use App\Mail\NewDriverAccountEmail;
use App\Mail\DriverPasswordResetEmail;
use Illuminate\Support\Facades\Mail;
use Helper;
use App\Classes\permission;

class UsersController extends Controller
{
    /**
     * Display users list page.
     *
     * @return View
     */
    public function index()
    {
       // if (permission::permitted('users')=='fail'){ return redirect()->route('denied'); }
        $users = User::join('roles','users.role','=','roles.id')->get();
        return view('users/index', compact('users'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('users.create');
    }

    /**
     * Load page with add/edit user data
     *
     * @param  mixed $userId
     * @return View
     */
    public function manage(int $userId = null)
    {
        $data['title'] = 'Manage User | Taxi Grid';
        $data['sub_title'] = 'Manage User';
        $data['sub_content'] = '';
        $fleets = Helper::fleetTypes();
        foreach ($fleets as $key => $fleet) {
            $data['fleets'][$key] = $fleets[$key][1];
        }
        $compId = Session::get('compId');

        if ($userId == null) {
            $data['sub_content'] = 'New Account';
            $data['selected_user']['user_name'] = null;
            $data['selected_user']['user_commission'] = null;
            $data['selected_user']['user_status'] = null;
            $data['selected_user']['user_gender'] = null;
            $data['selected_user']['user_phone'] = null;
            $data['selected_user']['user_email'] = null;
            $data['selected_user']['user_address'] = null;
            $data['selected_user']['user_city'] = null;
            $data['selected_user']['user_postal_code'] = null;
            $data['selected_user_permission'] = [];

            $data['user_auto_id'] = 0;
        } else {
            // Check whether user have access to the data
            if (AuthModel::where('user_auto_id', $userId)->where('user_company_auto_id', $compId)->exists()) {
                $selected_user = AuthModel::where('user_auto_id', $userId)->first();
                $selected_user->user_address = str_replace(array("\n"), " ", $selected_user->user_address);

                $data['selected_user'] = json_decode(json_encode($selected_user), true);
                $data['selected_user_permission'] = UserPermissionModel::where('user_permission_user_auto_id', $userId)->pluck('user_permission_id')->toArray();
                $data['user_auto_id'] = $userId;
                $data['sub_content'] = '#USR-'.$userId;
            } else {
                return abort(403);
            }
        }
        return view('company/admin/users/manage-user')->with(['data' => $data]);
    }

    /**
     * Save details of a user while add/edit
     *
     * @param  mixed $request
     * @return json
     *
     * @throws Exception
     */
    public function save(Request $request)
    {
        try {
            if (request()->ajax()) {
                // Validation
                $validator = $request->validate([
                    'user_name' => 'required',
                    'user_phone' => 'required|numeric',
                    'user_email' => 'required|email',
                    'user_address' => 'required',
                    'user_city' => 'required',
                    'user_postal_code' => 'required',
                    
                ]);

                if($request->user_auto_id == 0){
                    // Create New Instances
                    $user = new AuthModel();
                    // Retrive values from session
                    $compId = Session::get('compId');
                    $defaultPassword = "123456";

                    if (AuthModel::where('user_email', $request->user_email)->where('user_company_auto_id', $compId)->exists()) {
                        return ['status' => false, 'message' => 'Email address already exists'];
                    }

                    if ($request->user_password == '') {
                        $user_password_mail = $defaultPassword;
                        $user_password = password_hash($defaultPassword, PASSWORD_BCRYPT);
                    } else {
                        $user_password_mail = $request->user_password;
                        $user_password = password_hash($request->user_password, PASSWORD_BCRYPT);
                    }

                    // Setting up records for the user settings table
                    $user->user_company_auto_id = $compId;
                    $user->user_name = $request->user_name;
                    $user->user_gender = $request->user_gender;
                    $user->user_phone = $request->user_phone;
                    $user->user_email = $request->user_email;
                    $user->user_password = $user_password;
                    $user->user_address = strtolower($request->user_address);
                    $user->user_city = strtolower($request->user_city);
                    $user->user_postal_code = strtolower($request->user_postal_code);
                    $user->user_status = $request->user_status;
                    $user->user_company_code = '00001';
                    $user->user_type = '1';
                    $user->user_status = '1';


                    if (['status' => $user->save()]) {
                        $lastId = $user->user_auto_id;
                        /********  Mail settings begins ********/
                        foreach ($request['user_permission_id'] as $key => $value) {

                            $per = new UserPermissionModel();
                            $per->user_permission_id = $value;
                            $per->user_permission_user_auto_id = $lastId;
                            $per->save();
                        }


                        /********  Mail settings begins ********/

                        $companydata = CompanyModel::where('company_auto_id', $compId)->first();

                        // Mail account details
                        $mailbody['user_name'] = ucfirst(strtolower($request->user_name));
                        $mailbody['login_link'] = 'www.my.dispatchsystem.com.uk';
                        $mailbody['company_code'] = $companydata['company_code'];
                        $mailbody['company_name'] = ucfirst(strtolower($companydata['company_name']));
                        $mailbody['email'] = strtolower($request->user_email);
                        $mailbody['password'] = $user_password_mail;
                        $mailbody['company_domain'] = (isset($companydata['company_website']) && $companydata['company_website'] != '' ? $companydata['company_website'] : config('customconfig.default_domain'));

                        $mailbody['type'] = Helper::findFleetType($user->user_fleet_type);
                        $mailbody['plate_no'] = strtoupper(strtolower($request->user_fleet_plate_no));
                        $mailbody['make'] = ucfirst(strtolower($request->user_fleet_make));
                        $mailbody['model'] = ucfirst(strtolower($request->user_fleet_model));
                        $mailbody['commission'] = $request->user_commission.'%';

                        // Mail footer details
                        $mailfooter = Helper::mailFooter($companydata);

                        /********  Mail settings ends ********/

                        // Send welcome email to user
                        Mail::to($request->user_email)->send(new NewDriverAccountEmail($mailbody, $mailfooter));

                        return(['status' => true, 'lastId' => $lastId]);

                    } else {
                        return(['status' => false]);
                    }

                } else {
                    // Update existing user account
                    if (AuthModel::where('user_auto_id', $request->user_auto_id)->exists()) {
                        $user = AuthModel::where('user_auto_id', $request->user_auto_id)->first();

                        if ($request->user_password != '') {
                            $user->user_password = password_hash($request->user_password, PASSWORD_BCRYPT);
                        }

                        $user->user_name = $request->user_name;
                      //  $user->user_gender = $request->user_gender;
                        $user->user_phone = $request->user_phone;
                        $user->user_email = $request->user_email;
                        $user->user_address = strtolower($request->user_address);
                        $user->user_city = strtolower($request->user_city);
                        $user->user_postal_code = strtolower($request->user_postal_code);
                        $user->user_status = $request->user_status;

                       
                        if (['status' => $user->save()]) {
                            $lastId = $user->user_auto_id;
                            UserPermissionModel::where('user_permission_user_auto_id', $lastId)->delete();
                            foreach ($request['user_permission_id'] as $key => $value) {

                                $per = new UserPermissionModel();
                                $per->user_permission_id = $value;
                                $per->user_permission_user_auto_id = $lastId;
                                $per->save();
                            }
                            return json_encode(['status' => true, 'lastId' => $lastId]);
                        } else {
                            return json_encode(['status' => false]);
                        }

                    } else {
                        return json_encode(['status' => false, 'message' => 'User not found!']);
                    }

                    // Retrive values from session
                    $compId = Session::get('compId');

                  
                }
            }
        } catch (\Exception $e) {
            \Log::emergency("File:" . $e->getFile(). "Line:" . $e->getLine(). "Message:" . $e->getMessage());
            return json_encode(['status' => false, 'message' => 'Something went wrong! Please Try again.']);
        }
    }

    /**
     * Send email to reset the password of the user
     *
     * @param  mixed $request
     * @return json
     */
    public function resetPasswordEmail(Request $request)
    {
        if (DriverModel::where('user_auto_id', $request->user_auto_id)->exists()) {
            // Retrive values from session
            $compId = Session::get('compId');

            $user = DriverModel::where('user_auto_id', $request->user_auto_id)->first();
            $token = md5(time());
            $user->user_password_token = $token;

            /********  Setting records for mail begins ********/

            $companydata = CompanyModel::where('company_auto_id', $compId)->first();

            // Mail account details
            $mailbody['company_name'] = ucfirst(strtolower($companydata['company_name']));
            $mailbody['reset_url'] = 'https://www.pickmycab.com/resetpassword/'.$token;
            $mailbody['company_domain'] = (isset($companydata['company_website']) && $companydata['company_website'] != '' ? $companydata['company_website'] : config('customconfig.default_domain'));

            // Mail footer details
            $mailfooter = Helper::mailFooter($companydata);

            /********  Setting records for mail ends ********/

            // Send Email
            Mail::to($user->user_email)->send(new DriverPasswordResetEmail($mailbody, $mailfooter));

            return json_encode(['status' => $user->update()]);
        }
    }

    /**
     * Active or InActive the passenger account
     *
     * @param  mixed $request
     * @return json
     */
    public function changeAccountStatus(Request $request)
    {
        if (DriverModel::where('user_auto_id', $request->user_auto_id)->exists()) {
            $passenger = DriverModel::where('user_auto_id', $request->user_auto_id)->first();

            // Check current Status
            if ($passenger->user_status == 1) {
                $passenger->user_status = 2;
            } else {
                $passenger->user_status = 1;
            }

            return json_encode(['status' => $passenger->update()]);
        }
    }
}
