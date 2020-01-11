@extends('layout.backend.index')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0 text-dark">Due Payment</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ URL::to('portal/dashboard') }}">Home</a></li>
                  <li class="breadcrumb-item active">Spare Parts </li>
               </ol>
            </div>
            <!-- /.col -->
         </div>
         <!-- /.row -->
         <hr>
      </div>
      <!-- /.container-fluid -->
   </div>
   <!-- /.content-header -->
   <!-- Main content -->
   <section class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-12">
               <div class="card">
                  <div class="card-header" style="background-color: #dc3545; color: #ffffff;">
                     <h3 class="card-title">Spare Parts Order List</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                     <table id="brandList" class="table table-bordered table-hover">
                        <thead>
                           <tr>
                              <th>Parts Name</th>
                              <th>Customer Name</th>
                              <th>Customer Address</th>
                              <th>Customer Phone</th>
							  <th>Delivery By</th>
							  <th>Due</th>
							  <th>Cash Recived</th>
							  <th>Order Date</th>
							  <th>Delevery Date</th>
                              <th>Status</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach($dataList as $data)
                           <tr>
                              <td>{{ $data->SpareParts->spare_parts_name }}</td>
                              <td>{{ $data->name }}</td>
                              <td>{{ $data->address }}</td>
                              <td>{{ $data->phone }}</td>
							  <td>{{ $data->delivered_by }}</td>
							  <td>{{$data->due_price}}</td>
							  <td>{{$data->cash_received }}</td>
							  <td>{{ $data->created_at}}</td>
							  <td>{{ $data->delivery}}</td>
								  {{--<td>
                                 @if($data->confirmation  == 'confirmed')
                                 <div class="color-palette-set">
                                    <div class="bg-success color-palette"><span>Confirmed</span></div>
                                 </div>
                                 @elseif($data->confirmation  == 'not confirmed')
                                 <div class="color-palette-set">
                                    <div class="bg-warning color-palette"><span>Not Confirmed</span></div>
                                 </div>
                                 @else
                                 <div class="color-palette-set">
                                    <div class="bg-danger color-palette"><span>Rejected</span></div>
                                 </div>
                                 @endif
								  --}}
                              </td>
                              <td>
							  {{--@if($data->delivery  == 'picked')
                                 <div class="color-palette-set">
                                    <div class="bg-warning color-palette"><span>Picked</span></div>
                                 </div>
                                 @elseif($data->delivery  == 'delivered')
                                 <div class="color-palette-set">
                                    <div class="bg-success color-palette"><span>Delivered</span></div>
                                 </div>
                                 @else
                                 <div class="color-palette-set">
                                    <div class="bg-danger color-palette"><span>Not Delivered</span></div>
                                 </div>
                                 @endif
							  --}}
							  <div class="color-palette-set">
                                    <div class="bg-danger color-palette"><span>DUE</span></div>
                                 </div>
                              </td>
                              
                           </tr>
                           @endforeach
                        </tbody>
                        <tfoot>
                           {{-- 
                           <tr>
                              <td class="text-center" colspan="6"></td>
                              <td class="text-left" colspan="2">
                                 <a href="{{ URL::to('portal/spare-parts/add') }}">
                                 <button class="btn btn-outline-primary"><i class="fa fa-plus"></i>&nbsp;Add
                                 New
                                 </button>
                                 </a>
                              </td>
                           </tr>
                           --}}
                        </tfoot>
                     </table>
                  </div>
                  <!-- /.card-body -->
               </div>
               <!-- /.card -->
            </div>
         </div>
      </div>
   </section>
</div>
@endsection
@section('script')
<script>
   $(function () {
   $('#brandList').DataTable(
       {"aaSorting": [[1, "asc"]]}
       );
   });
</script>
<script type="text/javascript">
   $(document).ready(function () {
   $('.fancebox').fancybox({
   openEffect: 'elastic',
   closeEffect: 'elastic',
   helpers: {
   title: {
   type: 'float'
   }
   }
   });
   });
</script>
<script>
   new Vue({
   el: '#app',
   data: {
   dataList: '',
   },
   created(){
   this.fetchAllOrder();
   },
   methods:{
   fetchAllOrder(){
   axios.get('portal/spare_parts_order/list')
   .then(response => {
   this.dataList = response.data;
   console.log(response.data);
   })
   .error(error => console.log(error));
   }
   }
   });
</script>
@stop