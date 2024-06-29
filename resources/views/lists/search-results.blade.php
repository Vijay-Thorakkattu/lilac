
<div class="row">
  @if($users->isEmpty())
  <div class="col-md-12">
    <div class="alert alert-warning" role="alert">
        No data found.
    </div>
  </div>
  @else                    
  @foreach($users as $user)
  <div class="col-md-6">
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title"><b>{{ $user->name }}</b></h5>
            <p class="card-text"><b>{{ $user->department->name ?? 'No Department' }}</b></p>
            <p class="card-text">{{ $user->designation->name ?? 'No Designation' }}</p>
            <p class="card-text">{{ $user->phone_number }}</p>
        </div>
    </div>
  </div>
  @endforeach
  @endif
</div>