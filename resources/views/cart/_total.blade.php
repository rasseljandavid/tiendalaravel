<table class="table table-bordered">
  <tbody>
    <tr>
      <td class="text-right"><strong>Sub-Total</strong></td>
      <td class="text-right">@if($minicart)₱{{$minicart->total}}@else ₱0.00 @endif</td>
    </tr>

    <tr>
      <td class="text-right"><strong>Shipping & Handling</strong></td>
      <td class="text-right">₱0.00</td>
    </tr>

    <tr>
      <td class="text-right"><strong>Discount</strong></td>
      <td class="text-right">₱0.00</td>
    </tr>

    

    <tr>
      <td class="text-right"><strong>Total</strong></td>
      <td class="text-right">₱0.00</td>
    </tr>
  </tbody>
</table>