@extends('layouts.frontend')
@section('title', 'Homepage')
@section('content')

        <!-- categories -->
        <div class="container mt-5">
                <div class="section-title-furits text-center">
                    <h2>BROWSE OUR CATEGORIES</h2>
                </div>
                <br>
            <div class="row mt-5">
                @foreach($categories as $category)
                    <div class="col-lg-3 mb-5">
                        <div class="card category-card">
                            <a href="{{ route('catalog.index', $category->slug) }}">
                                <img class="img-cover" src="{{ Storage::url('images/categories/'. $category->cover) }}" alt="">
                                <span
                                class="position-absolute category-name"
                                style=" position: absolute;left: 50%;top: 50%;transform: translate(-50%,-50%);background-color: white;padding: .8rem 1rem;border: 3px solid #f0f0f0;">
                                    {{ $category->name }}
                                </span>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- end categories -->




@endsection
