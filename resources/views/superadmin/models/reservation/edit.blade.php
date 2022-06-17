<div class="modal-dialog modal-md">
    <div class="modal-content">
        <div class="modal-header modal-colored-header bg-warning">
            <h4 class="modal-title" id="primary-header-modalLabel">päivitä varaus</h4>
            <button type="button" class="btn-close bg-warning" data-bs-dismiss="modal" aria-hidden="true">
                <i class="fas fa-close"></i>
            </button>
        </div>

        <form class="form-horizontal" id="ajax-form" method="PUT" action="{{route('reservation.update',['id'=>$resevations->id])}}" data-table="reservation_list_update" data-notification='div'>
            <div class="modal-body">
                @csrf

                <div class="row">
                    <div class="col-md-6 col-12">
                        <label for="name" class="w-100 text-center mt-3 primary-text-cl">
                         <h4>Varaajan nimi</h4>
                        </label>
                        <input type="text" name="r_name" id="r_name" class="form-control w-100 border border-secondary @error('r_name') is-invalid @enderror" style="border-radius: 5px;" value="{{$resevations->r_name}}">
                        @error('r_name')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="col-md-6 col-12">
                        <label for="name" class="w-100 text-center mt-3 primary-text-cl">
                            <h4>Henkilömäärä</h4>
                        </label>
                        <input type="tel" name="num_of_book" id="num_of_book" class="form-control w-100 border  border-secondary @error('num_of_book') is-invalid @enderror" style="border-radius: 5px;" value="{{$resevations->num_of_book}}">
                        @error('num_of_book')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6 col-12">
                        <label for="name" class="w-100 text-center mt-3 primary-text-cl">
                         <h4>Päivämäärä</h4>
                        </label>
                        <input type="date" name="date" id="date" class="form-control w-100 border border-secondary @error('date') is-invalid @enderror" style="border-radius: 5px;"  value="{{$resevations->date}}">
                        @error('date')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="col-md-6 col-12">
                        <label for="name" class="w-100 text-center mt-3 primary-text-cl">
                            <h4>Date</h4>
                        </label>
                        <input type="date" name="clock_time" id="clock_time" class="form-control w-100 border border-secondary @error('clock_time') is-invalid @enderror" style="border-radius: 5px;"  value="{{$resevations->clock_time}}">
                         @error('clock_time')
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





