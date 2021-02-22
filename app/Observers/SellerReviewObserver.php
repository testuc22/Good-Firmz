<?php

namespace App\Observers;

use App\Models\{
    SellerReviews,Sellers
};

class SellerReviewObserver
{
    /**
     * Handle the SellerReviews "created" event.
     *
     * @param  \App\Models\SellerReviews  $sellerReviews
     * @return void
     */
    public function created(SellerReviews $sellerReviews)
    {
        $this->updateAverageReviews($sellerReviews);
    }

    /**
     * Handle the SellerReviews "updated" event.
     *
     * @param  \App\Models\SellerReviews  $sellerReviews
     * @return void
     */
    public function updated(SellerReviews $sellerReviews)
    {
        $this->updateAverageReviews($sellerReviews);
    }

    /**
     * Handle the SellerReviews "deleted" event.
     *
     * @param  \App\Models\SellerReviews  $sellerReviews
     * @return void
     */
    public function deleted(SellerReviews $sellerReviews)
    {
        $this->updateAverageReviews($sellerReviews);
    }

    /**
     * Handle the SellerReviews "restored" event.
     *
     * @param  \App\Models\SellerReviews  $sellerReviews
     * @return void
     */
    public function restored(SellerReviews $sellerReviews)
    {
        $this->updateAverageReviews($sellerReviews);
    }

    /**
     * Handle the SellerReviews "force deleted" event.
     *
     * @param  \App\Models\SellerReviews  $sellerReviews
     * @return void
     */
    public function forceDeleted(SellerReviews $sellerReviews)
    {
        $this->updateAverageReviews($sellerReviews);
    }

    function updateAverageReviews($sellerReviews){
        $avgReviews = SellerReviews::where('seller_id', $sellerReviews->seller_id)
                            ->avg('stars');
        if($avgReviews){
            Sellers::where('id',$sellerReviews->seller_id)->update(['avg_rating'=>$avgReviews]);
        }
        else{
            Sellers::where('id',$sellerReviews->seller_id)->update(['avg_rating'=>$sellerReviews->stars]);
        }
    }
}
