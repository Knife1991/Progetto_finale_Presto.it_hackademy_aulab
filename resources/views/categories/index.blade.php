<x-layout>
    
    {{-- @dd($category) --}}
    @if ($announcements->isEmpty())
    
    <h3 class="text-center mt-5 mb-5">Non ci sono annunci per questa categoria</h3>
    @else
    <div class="container ">
        <div class="row mt-5 justify-content-center">
            <h2 class="my_title text-center">{{$category->name}}</h2>
            @foreach ($announcements as $announcement)
            <div class="col-12 col-md-5 col-lg-3 my-3">
                <div class="card shadow d-block mx-auto" >
                    <img src="{{Storage::url($announcement->img)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$announcement->title}}</h5>
                        <p class="card-text text-truncate">{{$announcement->body}}</p>
                        <p class="card-text">{{$announcement->price}}$</p>
                        <a href="{{route('show.announcements', compact('announcement'))}}" class="btn bottone_annuncio d-block mx-auto">Scopri di piú</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif
    
</x-layout>