@extends('layouts.app')


@section('title')
    Articles
@endsection

@section('content')
    <div class="page-content page-home">
        <section class="store-carousel">
            <div class="container">
                <div class="row">
                <div class="col-lg-12" data-aos="zoom-in">
                    <div
                    id="storeCarousel"
                    class="carousel slide"
                    data-ride="carousel"
                    >
                    <ol class="carousel-indicators">
                        <li data-target="#storeCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#storeCarousel" data-slide-to="1"></li>
                        <li data-target="#storeCarousel" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        <img height="500px" src="images/RAPI.jpg" class="d-block w-100" alt="Carousel Image"/>
                        </div>
                        <div class="carousel-item">
                        <img height="500px" src="images/LANTST.jpg" class="d-block w-100" alt="Carousel Image"/>
                        </div>
                        <div class="carousel-item">
                        <img height="500px" src="images/RJ.jpg" class="d-block w-100" alt="Carousel Image"/>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </section>

            <section class="store-new-products">
                <div class="container">
                    <div class="row">
                        <div class="col-12" data-aos="fade-up">
                            <h5>Articles</h5>
                        </div>
                    </div>
                    <div class="row">
                        @php $incrementArticle = 0 @endphp
                        @forelse ($article as $article)
                        <div
                            class="col-6 col-md-4 col-lg-3"
                            data-aos="fade-up"
                            data-aos-delay="{{ $incrementArticle+= 100 }}"
                        >
                            <a class="component-products d-block" href="{{ route('detail-troubleshoot', $article->slug) }}">
                            <div class="products-thumbnail">
                                <div
                                class="products-image"
                                style="
                                    @if($article->galleries->count())
                                        background-image: url('{{ Storage::url($article->galleries->first()->photos) }}');
                                    @else
                                        background-color: #eee
                                    @endif
                                "
                                ></div>
                            </div>
                            <div class="products-text">
                                {{ $article->name }}
                            </div>
                            <div class="products-price">
                                {{-- {{ $article->price }} --}}
                            </div>
                            </a>
                        </div>

                        @empty
                        <div class="col-12 text-center"
                            data-aos="fade-up"
                            data-aos-delay="100">
                            No Article Found
                        </div>
                        
                        @endforelse
                    </div>
                </div>
            </section>
    </div>
@endsection