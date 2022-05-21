<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applications extends Model
{
    use HasFactory;
    protected $fillable = [
        'sr_number',
        'letter_number',
        'applicant_name',
        'applicant_civil_id',
        'request_date',
        'action_taken',
        'action_status',
        'action_date',
        'applicant_degree',
        'applicant_academic',
        'applicant_job_title',
        'csc_organization',
        'outgoing_letter_number',
        'source_name',
        'source_description',
        'source_secreatary_name',
        'secreatary_mobile',
        'eligible_requests',
        'current_request',
        'remaining_request',
        'additional_request',
        'total_request',
        'subject',
        'from_sector',
        'from_department',
        'attachment',
        'to_sector',
        'to_department',
        'general_notes',
        'special_notes',
      
    ];
    
}

