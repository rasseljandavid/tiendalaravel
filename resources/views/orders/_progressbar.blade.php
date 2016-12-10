<div class="row shop-tracking-status">
  <div class="col-md-12">
    <div class="well">

      <div class="order-status">

        <div class="order-status-timeline">
            <!-- class names: c0 c1 c2 c3 and c4 -->
            <div class="order-status-timeline-completion c3" style="width:{{ $order->progress }}; background-color: {{$order->status_color}};"></div>
        </div>
         
        <div class="image-order-status image-order-status-new active img-circle" style="box-shadow: 0px 0px 10px 0px {{$order->status_color}};">
            <span class="status">Received</span>
            <div class="icon"></div>
        </div>
        <div class="image-order-status image-order-status-active active img-circle" style="box-shadow: 0px 0px 10px 0px {{$order->status_color}};">
            <span class="status">In progress</span>
            <div class="icon"></div>
        </div>
        <div class="image-order-status image-order-status-intransit active img-circle" style="box-shadow: 0px 0px 10px 0px {{$order->status_color}};">
            <span class="status">On Transit</span>
            <div class="icon"></div>
        </div>
        <div class="image-order-status image-order-status-delivered active img-circle" style="box-shadow: 0px 0px 10px 0px {{$order->status_color}};">
            <span class="status">Shipped</span>
            <div class="icon"></div>
        </div>
        <!-- <div class="image-order-status image-order-status-completed active img-circle">
            <span class="status">Completed</span>
            <div class="icon"></div>
        </div> -->

      </div>

      @if($order->status_id > 0 && $order->status_id < 4)
      <!-- if it didnt reach shipped display cancel button -->
      <div class="btn-group">
        <button class="btn btn-danger btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Cancel Order <span class="caret"></span>
        </button>
        <ul class="dropdown-menu">
          <li style="padding:2px;min-width:320px;">
            <form method="POST" action="/order/statuschange" class="form" id="cancel-order-form">
              <div class="form form-group" style="">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{$order->id}}">
                <input type="hidden" name="status_id" value="5">
                <label for="confirm_comment">Reason:</label>
                <textarea rows="4" column="12" class="form-control" id="confirm_comment" name="reason" placeholder="Tell us the reason of cancelling this order"></textarea>
              </div>
            </form>
            <input type="button" name="confirm-cancel" id="confirm-cancel" class="btn btn-danger pull-right" value="Confirm Cancellation">
          </li>
        </ul>
      </div>
      @endif

      @if($order->status_id == 5)
      <div class="">
        <h5><span style="color:#f00;">This order has been cancelled by {{$order->who_cancelled}}</span></h5>
        <p>Reason: {{$order->reason}}</p>
      </div>
      @endif

    </div>
  </div>
</div>