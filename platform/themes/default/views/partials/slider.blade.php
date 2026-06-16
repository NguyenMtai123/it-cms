<div id="homeSlider" class="carousel slide carousel-fade" data-bs-ride="carousel">

    <div class="carousel-inner">

        @foreach ($sliders as $item)
            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">

                <img src="{{ asset('storage/' .$item->image) }}" class="d-block w-100 slider-image">

                <div class="carousel-caption">
                    {{-- <h2>{{ $item->title }}</h2>
                    <p>{{ $item->description }}</p> --}}
                </div>

            </div>
        @endforeach

    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#homeSlider" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>

    <button class="carousel-control-next" type="button" data-bs-target="#homeSlider" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>

</div>
