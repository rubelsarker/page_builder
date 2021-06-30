@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/nestable2/1.6.0/jquery.nestable.css" integrity="sha512-WLnZn2zeYB0crLeiqeyqmdh7tqN5UfBiJv9cYWL9nkUoAUMG5flJnjWGeeKIs8eqy8nMGGbMvDdpwKajJAWZ3Q==" crossorigin="anonymous" />
@endsection

@section('content')
    <div class="container">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title float-left">{{$menu->title}} Builder </div>
                    <a class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#myModal">Add Menu Item</a>
                </div>
            </div>
        </div>
        <div class="col-12">
            @if(session('success'))
                <div class="alert alert-success">
                    {!! session('success') !!}
                </div>
            @endif
                <div class="dd">
                    <ol class="dd-list">
                        @foreach($menu->items as $item)
                        <li class="dd-item" data-id="{{$item->id}}">
                            <div class="dd-handle">{{$item->label}}</div>
                            @if(count($item->subItems()) >0)
                            <ol class="dd-list">
                                @foreach($item->subItems() as $subItem)
                                <li class="dd-item" data-id="{{$subItem->id}}">
                                    <div class="dd-handle">{{$subItem->label}}</div>
                                </li>
                                @endforeach
                            </ol>
                            @endif
                            @endforeach
                        </li>
                    </ol>
                </div>
        </div>
    </div>
    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog  modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add Menu Item</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>


                <form action="{{route('menu-item.store')}}" method="POST">
                    @csrf
                    <!-- Modal body -->
                    <div class="modal-body">
                        <input type="hidden" name="menu_id" value="{{$menu->id}}">
                        <div class="form-group">
                            <label for="label">Label</label>
                            <input required name="label" type="text" class="form-control" placeholder="Label" id="label">
                        </div>
                        <div class="form-group">
                            <label for="url">Url</label>
                            <input required name="url" type="text" class="form-control" placeholder="Url" id="url">
                        </div>
                        <div class="form-group">
                            <label for="parent">Select Parent:</label>
                            <select name="parent" class="form-control" id="parent">
                                <option value="" disabled selected>Select One</option>
                                @foreach($menuItems as $item)
                                <option value="{{$item->id}}">{{$item->label}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/nestable2/1.6.0/jquery.nestable.min.js" integrity="sha512-7bS2beHr26eBtIOb/82sgllyFc1qMsDcOOkGK3NLrZ34yTbZX8uJi5sE0NNDYFNflwx1TtnDKkEq+k2DCGfb5w==" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(function () {
            $('.dd').nestable({maxDepth: 2});
            $('.dd').on('change', function (e) {
                console.log(JSON.stringify($('.dd').nestable('serialize')))
                $.post('{{ route('menu-item.order',$menu->id) }}', {
                    order: JSON.stringify($('.dd').nestable('serialize')),
                    _token: '{{ csrf_token() }}'
                }, function (data) {

                    alert('done');
                });
            });
        });
    </script>
@endsection
