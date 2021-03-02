@extends('layouts.app', [ 'activePage' => 'debit-input', 'title' => __('Debit Air')])

@section('content')
<div class="container" style="height: auto;">
  <div class="row ">
    <div class="col-md-4">
        <h1 class="">Data Debit</h1>
      </div>
    </div>
<div class="">
  <div class="row form-group">
    <div class="col-sm-4">
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary btn-sm" onclick='$("#myModal").modal();buttonAction("add");'>
        Input
      </button>
      <!-- Modal -->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" onclick="clearModalHide()"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Input Debit</h4>
            </div>
            <div class="modal-body">
             <!--  <form class="" action="{{URL::to('customer')}}" method="post"> -->
                {{csrf_field()}}
                <div class="form-group">
                  <label for="exampleInputEmail1">Debit Location Id</label>
                  <input type="text" name="name" id="nama" class="form-control"  placeholder="Nama Lengkap">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Debit</label>
                  <textarea class="form-control" id="alamat" name="address" rows="3" placeholder="Alamat"></textarea>
                </div>
                <div id="modal_error_message"></div>
                <div class="modal-footer">
              <button type="button" onclick="dataCreate()" id="modal_add" class="btn btn-primary">Simpan</button>
              <button type="button" onclick="dataUpdate()" id="modal_edit" class="btn btn-primary">Ubah</button>
              <button type="button" class="btn btn-default" onclick="clearModalHide()">Batal</button>

            </div>
             <!--  </form> -->
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /.row -->
<div class="content">
  <div class="row form-group">
    <div class="col-lg-12">
        <div class="panel panel-default">
              <div class="panel-heading">
                  Daftar Data Pelanggan
              </div>
              <!-- /.panel-heading -->
              <div class="panel-body">
                <div class="row">
                        <div class="col-sm-12">

                                {{-- <table width="100%" class="table table-striped table-bordered table-hover" >
                                        <thead>
                                            <tr>
                                                <th >Id</th>
                                                <th >DebitLocId</th>
                                                <th >Debit</th>
                                                <th width="10%">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody> --}}
                                                <hehe id="dataCoba">
                                    
                                                    </hehe>
                                        {{-- </tbody>
                                 
                                </table> --}}
                        </div>
                      </div>
              </div>
              <!-- /.table-responsive -->
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('js')
<script>
    var token = Cookies.get('token');
    var urlApi='/api/debit';
    $.ajax({
        url : urlApi,
        headers : {
            'Accept':'application/json',
            'Authorization' : 'Bearer '+token
        },

        success : function(psn){
            console.log(psn);
        }
    });
</script>
<script type="text/babel">
    class HAHAHA extends React.Component{
        constructor(props){
            super(props);
            this.state = {
                data : []
            }
        }
        componentDidMount(){
            let token = Cookies.get('token');
            fetch('/api/debit',{
                method:'GET',
                headers:{
                    'Accept':'application/json',
                    'Authorization' : 'Bearer '+token
                }
            }).then(data => data.json()).then(response => {
                this.setState({data:response.data}); 
            });

        } 
            render() {
                return (
                    <table width="100%" className="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Director</th>
                            <th>Producer</th>
                        </tr>
                        </thead>
                        <tbody>{this.state.data.map(function(item, key) {
             
                            return (
                                <tr key = {key}>
                                    <td>{item.id}</td>
                                    <td>{item.user_id}</td>
                                    <td>{item.name}</td>
                                </tr>
                            )
                        
                        })}</tbody>
                    </table>

                )
            }
        }
          
     

    

    ReactDOM.render(<HAHAHA/>, document.getElementById("dataCoba"))
        // render(){
        //     let listnya = this.state.data.map((i) => 
        //     (
                
                   
        //                 <tr>
        //                     <td>{i.id}</td>
        //                     <td>{i.user_id}</td>
        //                     <td>{i.name}</td>
        //                 </tr>
                   
                
                   
        //     ));
        //     return ( <tbody>
        //         {listnya}
        //     </tbody>)
        // }
    // }
    // ReactDOM.render(<HAHAHA/>, document.getElementById('dataCoba'));
</script>
@endpush