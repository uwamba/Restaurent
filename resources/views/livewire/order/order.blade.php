<div>
    <form action="{{ route('order.store') }}" method="POST">
        @csrf
        <div class="form-group {{ $errors->has('customer_name') ? 'has-error' : '' }}">
            Customer name
            <input type="text" name="customer_name" class="form-control"
                   value="{{ old('customer_name') }}" required>
            @if($errors->has('customer_name'))
                <em class="invalid-feedback">
                    {{ $errors->first('customer_name') }}
                </em>
            @endif
        </div>
        <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
            Customer email
            <input type="phone" name="phone" class="form-control"
                   value="{{ old('phone') }}">
            @if($errors->has('phone'))
                <em class="invalid-feedback">
                    {{ $errors->first('phone') }}
                </em>
            @endif
        </div>

        <div class="card">
            <div class="card-header">
                Products
            </div>

            <div class="card-body">
                <table class="table" id="products_table">
                    <thead>
                    <tr>
                        <th>Menu</th>
                        <th>Quantity</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($orderMenus as $index => $orderMenu)
                        <tr>
                            <td>
                                <select name="orderMenus[{{$index}}][menu_id]"
                                        wire:model="orderMenus.{{$index}}.menu_id"
                                        class="form-control">
                                    <option value="">-- choose Menu --</option>
                                    @foreach ($allMenus as $menu)
                                        <option value="{{ $menu->id }}">
                                            {{ $menu->name }} ({{ number_format($menu->price, 2) }})
                                        </option>
                                    @endforeach
                                </select>
                            </td>

                            <td>
                                <input type="number"
                                       name="orderMenus[{{$index}}][quantity]"
                                       class="form-control"
                                       wire:model="orderMenus.{{$index}}.quantity" />
                            </td>
                            <td>
                                <a href="#" wire:click.prevent="removeMenu({{$index}})">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-sm btn-secondary"
                            wire:click.prevent="addMenu">+ Add Another Product</button>
                    </div>
                </div>
            </div>
        </div>
        <br />
        <div>
            <input class="btn btn-primary" type="submit" value="Save Order">
        </div>
    </form>
</div>
