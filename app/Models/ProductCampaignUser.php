<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCampaignUser extends Model
{

        /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'product_campaign_users';

        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
    ];

    /**
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo

     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
