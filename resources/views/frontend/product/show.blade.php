@extends('layouts.frontend')
@section('title', $product->name)
@section('content')
    <div class="product-details ptb-100 pb-90">

    @if(session()->has('message'))
        <div class="alert alert-{{ session()->get('alert-type') }} alert-dismissible fade show" role="alert" id="alert-message">
            {{ session()->get('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-7 col-12">
                    <div class="product-details-img-content">
                        <div class="product-details-tab mr-70">
                            @if($product->media_count)
                                <div class="product-details-large tab-content">
                                    @foreach ($product->media as $media)
                                        <div class="tab-pane {{ $loop->index == 0 ? 'active' : '' }} show fade"
                                             id="pro-details{{ $loop->index }}" role="tabpanel">
                                            <div class="easyzoom easyzoom--overlay">
                                                @if($product->media)
                                                    <a href="{{ asset('storage/images/products/' . $media->file_name ) }}">
                                                        <img src="{{ asset('storage/images/products/' . $media->file_name ) }}"
                                                             alt="{{ $product->name }}">
                                                    </a>
                                                @else
                                                    <img src="{{ asset('img/no-img.png' ) }}"
                                                         alt="{{ $product->name }}">
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="product-details-small nav mt-12" role=tablist>
                                    @foreach ($product->media as $media)
                                        <a class="{{ $loop->index == 0 ? 'active' : '' }} mr-12"
                                           href="#pro-details{{ $loop->index }}" data-toggle="tab" role="tab"
                                           aria-selected="true">
                                            <img style="width: 90px;" src="{{ asset('storage/images/products/' . $media->file_name ) }}"
                                                 alt="{{ $product->name }}">
                                        </a>
                                    @endforeach
                                </div>
                            @else
                                <img src="{{ asset('img/no-img.png' ) }}" alt="{{ $product->name }}">
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-5 col-12">
                    <div class="product-details-content">
                        <h3>{{ $product->name }}</h3>


                        <p>{!! $product->description !!}</p>

                        <div class="product-details-cati-tag mt-35">
                            <ul>
                                <li class="categories-title">Categories :</li>
                                <li><a class="badge badge-warning text-white" href="{{ route('catalog.index', $product->category->slug) }}">{{ $product->category->name }}</a></li>
                            </ul>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product-description-review-area pb-90">
        <div class="container">
            <div class="product-description-review text-center">
                <div class="description-review-title nav" role=tablist>
                    <a href="#pro-dec" data-toggle="tab" role="tab" aria-selected="true">
                        Description
                    </a>
                </div>
                <div class="description-review-text tab-content">
                    <div class="tab-pane fade" id="pro-dec" role="tabpanel">
                        <p>{!! $product->details !!}</p>
                    </div>
                    <div class="tab-pane active show fade" id="pro-review" role="tabpanel">
                        <div class="page-blog-details section-padding--lg bg--white pt-0">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-9 col-12">
                                        <livewire:shop.single-product-review-component :product="$product" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

