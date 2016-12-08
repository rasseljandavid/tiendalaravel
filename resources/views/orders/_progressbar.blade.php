
<div class="row shop-tracking-status">
    
    <div class="col-md-12">
        <div class="well">

            <div class="order-status">

                <div class="order-status-timeline">
                    <!-- class names: c0 c1 c2 c3 and c4 -->
                    <div class="order-status-timeline-completion c3" style="width:{{ $order->progress }}"></div>
                </div>

                <div class="image-order-status image-order-status-new active img-circle">
                    <span class="status">Received</span>
                    <div class="icon"></div>
                </div>
                <div class="image-order-status image-order-status-active active img-circle">
                    <span class="status">In progress</span>
                    <div class="icon"></div>
                </div>
                <div class="image-order-status image-order-status-intransit active img-circle">
                    <span class="status">On Transit</span>
                    <div class="icon"></div>
                </div>
                <div class="image-order-status image-order-status-delivered active img-circle">
                    <span class="status">Shipped</span>
                    <div class="icon"></div>
                </div>
                <div class="image-order-status image-order-status-completed active img-circle">
                    <span class="status">Completed</span>
                    <div class="icon"></div>
                </div>

            </div>
        </div>
    </div>

</div>