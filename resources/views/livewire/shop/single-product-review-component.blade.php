<div class="blog-details content" x-data="{ showForm: @entangle('showForm') }">
    <div class="comments_area pb-5">
        <ul class="comment__list">
            @forelse($product->approvedReviews as $review)
                <li>
                    <div class="wn__comment d-flex" style="column-gap: 1rem;">
                        <div class="">
                            @if($review->user && $review->user->user_image)
                                <img class="rounded-circle" src="{{ asset('storage/images/users/' . $review->user->user_image) }}" alt="" width="50">
                            @else
                                <img src="https://ui-avatars.com/api/?name={{ $review->user->name }}&background=0d8abc&color=fff" alt="{{ $review->name }}">
                            @endif
                        </div>
                        <div class="content d-flex" style="column-gap: 2rem;">
                            <div class="">
                                <strong>{{ $review->user->name }}</strong>
                                <small class="comnt__author d-block d-sm-flex">{{ $review->created_at ? $review->created_at->format('d M, Y') : '' }}</small>
                                <div>
                                    @if($review->rating)
                                        @for($i = 0; $i < 5; $i++)
                                            <i class="{{ round($review->rating) <= $i ? 'far' : 'fas' }} fa-star"></i>
                                        @endfor
                                    @endif
                                </div>
                                <div>
                                    <p style="width: 100%; font-size: 14px;">{{ $review->content }}</p>
                                </div>
                            </div>
                            <div class="ml-auto">
                                @if($currentRatingId === $review->id)
                                    @auth
                                        <span x-on:click="showForm = !showForm"
                                            class="text-primary" style="cursor: pointer">
                                            <i class="fas fa-edit"></i>
                                        </span>
                                        <br><br>
                                        <span x-on:click.prevent="return confirm('Are you sure?') ? @this.delete({{ $currentRatingId }}) : false"
                                              class="text-danger" style="cursor: pointer">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                    @endauth
                                @endif
                            </div>
                        </div>
                    </div>
                </li>
            @empty

            @endforelse
        </ul>
    </div>

</div>
