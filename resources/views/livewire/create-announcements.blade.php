<div>
    <div class="container-fluid my-5">
        <div class="row justify-content-center">
            <h3 class="text-center mb-5 my_title">INSERISCI ANNUNCIO</h3>
            <div class="col-12 col-md-8 col-lg-6">

                @if (session('message'))
                <div class="alert rounded-3  alert-success">
                    {{ session('message') }}
                </div>
                @endif

                <form class="p-5 shadow"
                wire:submit="store"
                enctype="multipart/form-data"
                >
                <div class="mb-3">
                    <label for="title" class="form-label">Titolo</label>
                    <input wire:model.blur="title" type="text" class="form_bordi shadow form-control" id="title">
                    <div class="text-danger">@error('title') {{ $message }} @enderror</div>
                </div>
                <div class="mb-3">
                    <label for="body" class="form-label">Descrizione</label>
                    <textarea wire:model.blur="body" class="form-control shadow form_bordi" id="body" cols="30" rows="8"></textarea>
                    <div class="text-danger">@error('body') {{ $message }} @enderror</div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Categorie</label>
                    <select class="form-select shadow form_bordi" wire:model="category" aria-label="Default select example">
                        <option>Seleziona categoria</option>
                        @foreach ($categories as $category)
                        <option  value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    <div class="text-danger">@error('category') {{ $message }} @enderror</div>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Prezzo</label>
                    <input wire:model.blur="price" type="number" class="form-control shadow form_bordi" id="price">
                    <div class="text-danger">@error('price') {{ $message }} @enderror</div>{{-- nuovo metodo di gestione degli errori per il client --}}
                </div>
                <div class="mb-3">
                    <label for="img" class="form-label">Inserisci l'immagine</label>
                    <input wire:model="img" type="file" class="form-control shadow form_bordi" id="img">
                </div>
                <button type="submit" class="btn bottone_annuncio mt-3">Crea Annuncio</button>
            </form>
        </div>
    </div>
</div>
</div>
