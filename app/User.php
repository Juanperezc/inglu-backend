<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Laravel\Scout\Searchable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasRoles;
    use Searchable;
    use SoftDeletes;
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'email',
        'address',
        'profile_pic',
        'phone',
        'gender',
        'status',
        'password',
        'id_card',
        'last_name',
        'date_of_birth',
        'type'
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


      /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function setPasswordAttribute($pass)
    {
        $this->attributes['password'] = Hash::make($pass);
    }
    
    public function medical_appointments()
    {
        return $this->hasMany('App\Appointment', 'medical_staff_id');
    }

    public function posts()
    {
        return $this->hasMany('App\Post', 'user_id');
    }


    public function patient_appointments()
    {
        return $this->hasMany('App\Appointment', 'patient_id');
    }

    public function medical_record()
    {
        return $this->hasOne('App\MedicalRecord', 'user_id');
    }

    public function specialties()
    {
        return $this->belongsToMany('App\Specialty')->withTimestamps();
    }


    public function workspaces()
    {
        return $this->belongsToMany('App\Workspace')->using('App\UserWorkspace')->withPivot([
            'created_at',
            'updated_at',
        ]);
    }

    public function suggestions()
    {
        return $this->belongsToMany(Suggestion::class,
            'suggestion_user',
            'user_id', // you might need to switch place with this one and the one below
            'suggestion_id', // Can nenver remember how these goes
            'id')->using('App\SuggestionUser')->withPivot([
            'text',
            'status',
        ])->withTimestamps();
    }

    public function claims()
    {
        return $this->belongsToMany(Claim::class,
            'claim_user',
            'user_id', // you might need to switch place with this one and the one below
            'claim_id', // Can nenver remember how these goes
            'id')->using('App\ClaimUser')->withPivot([
            'text',
            'status',
        ])->withTimestamps();
    }


    public function walkthroughs()
    {
        return $this->belongsToMany('App\Walkthrough');
    }

    public function toSearchableArray()
    {
        return [
            "email" => $this->email,
            "name" => $this->name,
            "last_name" => $this->last_name,
            "id_card" =>$this->id_card,
            "profile_pic" => $this->profile_pic,
            "date_of_birth" =>$this->date_of_birth,
            "phone" => $this->phone,
            "address" => $this->address,
            "gender" => $this->gender,
            'status' => $this->status,
        ];
    }

    public function searchableAs()
    {
        return 'users_index';
    }
}
