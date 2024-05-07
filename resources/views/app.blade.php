<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<form method="POST" action="{{ route('deposit') }}">
    @csrf
    <h5 class="text-center mb-3">Make A Deposit</h5>
    <div class="row mb-3">
        <label for="amount" class="col-md-4 col-form-label text-md-end">{{ __('Amount') }}</label>
        <div class="col-md-6">
            <input id="amount" type="number" class="form-control @error('amount') is-invalid
            @enderror" name="amount" value="{{ old('amount') }}" required autocomplete="amount" autofocus>
            @error('amount')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="row mb-0">
        <div class="col-md-8 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Deposit') }}
            </button>
        </div>
    </div>
</form>