@extends('layout.app')

@section('title', 'Animal CRUD')

@section('header', 'Animal Lists')

@section('contents')
    <a type="button" class="btn btn-primary" href="/new">Add new animal</a>
    <table class="table">
        <thead>
            <tr class=:textcenter>
                <th class="text-center" scope="col">No</th>
                <th class="text-center" scope="col">Animal Name</th>
                <th class="text-center" scope="col">Animal Age</th>
                <th class="text-center" scope="col">Animal Photo</th>
                <th class="text-center" scope="col">Animal Legs</th>
                <th class="text-center" scope="col">Animal Sound</th>
                <th class="text-center" scope="col">Animal Description</th>
                <th class="text-center" scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($animals as $animal)
                <tr class=:textcenter>
                    <th class="text-center" scope="row">{{ $loop->index + 1 + ($animals->currentPage() - 1) * 5 }}</th>
                    <td class="text-center">{{ $animal->name }}</td>
                    <td class="text-center">{{ $animal->usia }}</td>
                    <td class="text-center">
                        <img class="img-fluid" src="{{ asset($animal->foto) }}">
                    </td>
                    <td class="text-center">{{ $animal->jumlah_kaki }}</td>
                    <td class="text-center">{{ $animal->suara }}</td>
                    <td class="text-center">{{ Str::limit($animal->description, 100) }}</td>
                    <td>
                        <form action="/{{ $animal->id }}/delete" method="POST">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                @csrf
                                <a type="button" class="btn btn-success" href="/{{ $animal->id }}/detail">Details</a>
                                <a type="button" class="btn btn-primary" href="/{{ $animal->id }}/edit">Edit</a>
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('apakah kamu yakin menghapus data ini ?')">Delete</button>
                            </div>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $animals->links() }}

@endsection