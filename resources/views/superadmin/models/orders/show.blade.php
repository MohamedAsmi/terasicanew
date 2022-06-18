<div class="modal-dialog modal-md">
    <div class="modal-content">
        <div class="modal-header modal-colored-header bg-warning">
            <h4 class="modal-title" id="primary-header-modalLabel">päivitä varaus</h4>
            <button type="button" class="btn-close bg-warning" data-bs-dismiss="modal" aria-hidden="true">
                <i class="fas fa-close"></i>
            </button>
        </div>

        <form class="form-horizontal" id="ajax-form" method="PUT" action="" data-table="reservation_list_update" data-notification='div'>
            <div class="modal-body">
                @csrf

                <div class="row">
                    <div class="col-md-12 col-12">
                        <label for="name" class="w-100 text-center mt-3 primary-text-cl">
                         <h4>Order No: {{$orders->orderid}}</h4>
                        </label>
                    </div>
                    <div class="col-md-12 col-12">
                        <label for="name" class="w-100 text-center mt-3 primary-text-cl">
                        @php
                            $LRtitle = stripos($orders->itemid, ",");
                        @endphp
                        @if ($LRtitle == false)
                        @php
                            $price = $orders->price;
                        @endphp
                         <h3>Order Details: 1x {{$orders->name}}</h3>
                        @else
                        @php
                            $parts = explode(",", $orders->itemid);
                            $count = count($parts);
                            $price = 0;
                        @endphp
                            <h3>Order Details:</h3><br>
                            @foreach($parts as $part)
                            @php
                                $product = App\Product::findOrFail($part);
                                $price += $product->hinda;
                            @endphp
                            <h3>1x {{$product->p_name}} = {{$product->hinda}}</h3><br>
                            @endforeach
                        @endif
                        <h3>Total = {{$price}}</h3>
                        </label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div>
                                    <div id="message-area"></div>
                                </div>
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-warning" data-loading-text="Updating...">Tallenna</button>
            </div>
        </form>
    </div>
</div>





