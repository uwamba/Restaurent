<div>
  <div class="card">
            <div class="card-header">
                Items
            </div>

            <div class="card-body">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="25%">Customer Name</th>
                        <th width="25%">Customer Phone</th>
                        <th width="25%">created By</th>
                        <th width="25%">View Order Items</th>
                        <th width="25%">Edit</th>
                        <th width="25%">Delete</th>


                    </tr>
                </thead>
                <tbody>
             {{$key = $menu->keys()}}



                </tbody>
                </table>

            </div>

        <div>
            <input class="btn btn-primary" type="submit" value="Save Order">
        </div>
</div>
