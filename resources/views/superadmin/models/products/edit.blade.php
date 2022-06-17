<div class="modal-dialog modal-md">
    <div class="modal-content">
        <div class="modal-header modal-colored-header bg-warning">
            <h4 class="modal-title" id="primary-header-modalLabel">päivitä varaus</h4>
            <button type="button" class="btn-close bg-warning" data-bs-dismiss="modal" aria-hidden="true">
                <i class="fas fa-close"></i>
            </button>
        </div>

        <form class="form-horizontal" id="ajax-form" method="PUT" action="{{route('product.update',['id'=>$products->id])}}" data-table="product_list_update" data-notification='div'>
            <div class="modal-body">
                @csrf

                <div class="row">
                    <div class="col-md-6 col-12">
                        <label for="name" class="w-100 text-center mt-3 primary-text-cl">
                         <h4>Varaajan nimi</h4>
                        </label>
                        <input type="text" name="p_name" id="p_name" class="form-control w-100 border border-secondary @error('p_name') is-invalid @enderror" style="border-radius: 5px;" value="{{$products->p_name}}">
                        @error('p_name')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="col-md-6 col-12">
                        <label for="name" class="w-100 text-center mt-3 primary-text-cl">
                            <h4>Henkilömäärä</h4>
                        </label>
                        <input type="text" name="osio" id="osio" class="form-control w-100 border  border-secondary @error('osio') is-invalid @enderror" style="border-radius: 5px;" value="{{$products->osio}}">
                        @error('osio')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6 col-12">
                        <label for="name" class="w-100 text-center mt-3 primary-text-cl">
                         <h4>Päivämäärä</h4>
                        </label>
                        <input type="text" name="hinda" id="hinda" class="form-control w-100 border border-secondary @error('hinda') is-invalid @enderror" style="border-radius: 5px;"  value="{{$products->hinda}}">
                        @error('hinda')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="col-md-6 col-12">
                        <label for="name" class="w-100 text-center mt-3 primary-text-cl">
                            <h4>Date</h4>
                        </label>
                        <input type="text" name="v_muo" id="v_muo" class="form-control w-100 border border-secondary @error('v_muo') is-invalid @enderror" style="border-radius: 5px;"  value="{{$products->v_muo}}">
                         @error('v_muo')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6 col-12">
                        <label for="name" class="w-100 text-center mt-3 primary-text-cl">
                         <h4>Päivämäärä</h4>
                        </label>
                        <input type="text" name="status" id="status" class="form-control w-100 border border-secondary @error('status') is-invalid @enderror" style="border-radius: 5px;"  value="{{$products->status}}">
                        @error('status')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
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





