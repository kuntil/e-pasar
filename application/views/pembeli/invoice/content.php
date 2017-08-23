
<!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i>
            <small class="pull-right">Tanggal: <?php echo $date;?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          Dari
          <address>
			<?php foreach ($store as $store){}?>
            <strong><?php echo $store->name;?></strong><br>
            <?php echo $store->address;?><br>
            Telp/Hp: <?php echo $store->nohp;?><br>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          Untuk
          <address>
			<?php foreach ($user as $user){}?>
            <strong><?php echo $user->name;?></strong><br>
            <?php echo $user->address;?><br>
            Telp/Hp: <?php echo $user->nohp;?><br>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Order ID:</b> <?php echo $order_id;?><br>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped table-condensed">
            <thead>
            <tr>
				<td><b>No</b></td>
				<td colspan='2'><b>Nama Produk</b></td>
				<td><b>Harga</b></td>
				<td><b>Qty</b></td>
				<td><b>Jumlah</b></td>
			</tr>
            </thead>
            <tbody>
			<?php 
			$no = 1;
			$n = 0;
			foreach ($order as $order){ ?>
			<tr>
				<td><?php echo $no++;?></td>
				<td style="width: 10px"><img src="<?php echo base_url();?>upload/product/<?php echo $order->image2;?>"width="40" height="40" align="center"></td>
				<td><?php echo $order->name;?></td>
				<td><?php echo number_format($order->price,0,",",".");?></td>
				<td><?php echo number_format($order->qty_order,0,",",".");?></td>
				<td><?php echo number_format($order->total,0,",",".");?></td>
				<?php $n = $n + $order->total; ?>
			</tr>
			<?php } ?>
			<td colspan="4" align="center"></td>
			<td align="center"><b> Total </b></td>
			<td style="color:green;"><b><?php echo number_format($n,0,",",".");?></b></td>
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->


      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="<?php echo base_url()?>invoice/print_invoice?order_id=<?php echo $order->order_id; ?>&&store_id=<?php echo $order->store_id; ?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Cetak</a>
        </div>
      </div>
    </section>
   