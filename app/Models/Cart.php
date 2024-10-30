<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'user_id',
        'plan_currency_id',
        'value',
        'description',
        'status',
        'top_point',
        'validity',
        'title',
        'background_image',
        'type_cart_id',
         'description_home',
        'Pricing',
        'Time_to_display',
        'Featured_job',
        'job_suggestions',
        'job_suggestion_cv',
        'job_suggestion_related',
        'job_suggestion_top',
        'Top_Job_Alert',
        'prime_time',
        'regular_time',
        'AI_powered_CV',
        'Top_Add_ons',
        'Advanced_news_headline',
        'Add_on_visual',
        'Service_Warranty',
        'search_results',
        'Top_Add_ons_in_2',
        'Activate_CV_proposal',
        'Give_350_Credits',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function planCurrency()
    {
        return $this->belongsTo(PlanCurrency::class, 'plan_currency_id');
    }

    public function planFeatures()
    {
        return $this->belongsToMany(PlanFeature::class, 'cart_plan_feature');
    }
    public function typeCart()
    {
        return $this->belongsTo(TypeCart::class, 'type_cart_id');
    }
    public function employers()
    {
        return $this->belongsToMany(Employer::class, 'cart_employer')
            ->withPivot('start_date', 'end_date')
            ->withTimestamps();
    }
}
