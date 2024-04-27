<x-layout>
    <div class="container-fluid p-5 bg-info text-center text-white">
        <div class="row justify-content-center">
            <h1 class="display-1">
                Lavora con noi
            </h1>
        </div>
    </div>

    <div class="container my-5">
        <div class="row justify-content-center align-items-center border rounded p-2 shadow">
            <div class="col-12 col-md-6">
                <h2>Lavora come amministratore</h2>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sed obcaecati voluptatibus autem adipisci iure ex officiis, earum culpa doloremque, voluptates explicabo eaque repellat unde. Nulla harum laborum maiores suscipit voluptatem!</p>
                <h2>Lavora come revisore</h2>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sed obcaecati voluptatibus autem adipisci iure ex officiis, earum culpa doloremque, voluptates explicabo eaque repellat unde. Nulla harum laborum maiores suscipit voluptatem!</p>
                <h2>Lavora come redattore</h2>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sed obcaecati voluptatibus autem adipisci iure ex officiis, earum culpa doloremque, voluptates explicabo eaque repellat unde. Nulla harum laborum maiores suscipit voluptatem!</p>
            </div>
            <div class="col-12 col-md-6">
                @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </div>
                @endif
                <form class="card p-5 shadow" action="{{route('careers.submit')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="role" class="form-label">Per quale ruolo ti stai candidando?</label>
                        <select name="role" id="role" class="form-control">
                            <option value="">Scegli qui</option>
                            <option value="admin">Amministratore</option>
                            <option value="revisor">Revisore</option>
                            <option value="writer">Redattore</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input name="email" type="email" class="form-control" id="email"value="{{old('email') ?? Auth::user()->email}}">
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">message</label>
                        <textarea name="message" id="message" cols="30" rows="7" class="form-control" id="message">
                            {{old('message')}}
                        </textarea>
                    </div>
                    <button type="submit" class="btn btn-info text-white">Invia la tua candidatura</button>
                </form>

            </div>
        </div>
    </div>
</x-layout>