@extends('layouts.app', [ 'activePage' => 'debit-location', 'title' => __('Debit Air')])

@section('content')
    <div class="container" style="height: auto;">
        <div class="row ">
            <div class="col-xs-4">
                <h2 class="">Debit Lokasi</h2>
            </div>
        </div>
        <div class="">
            <div class="row form-group">
                <div class="col-xs-4">
                </div>
            </div>
        </div>


        <div class="">
            <div class="row form-group">
                <div class="col-xs-4">


                </div>
            </div>
        </div>
        <!-- /.row -->
        <div class="content">
            <div class="row form-group">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Data Debit Lokasi
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-12">

                                    <hehe id="dataCoba">

                                    </hehe>

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

    {{-- react --}}


    <script type="text/babel">
        class ModalCreate extends React.Component{
            constructor(props){
                super(props);
                this.handleTambah= this.props.callback;
            }
            tambah = (e)=>{
                console.log('bener',this.props.callback);
                this.handleTambah(this.props.data);
            }
            clearModalHide(e){
                $('#myModalTambah').modal('hide');
            }
            render(){
                return <div className="modal fade" id="myModalTambah" tabIndex="-1" role="dialog" aria-labelledby="myModalLabel" data-keyboard="false" data-backdrop="static">
                    <form method="POST" onSubmit={this.handleTambah.bind(this)}>
                        <div className="modal-dialog" role="document">
                            <div className="modal-content">
                                <div className="modal-header">
                                    <h4 className="modal-title" id="myModalLabel" >Tambah Debit Lokasi</h4>
                                    <button type="button" className="close" onClick={this.clearModalHide.bind(this)} data-toggle="dismiss"><span aria-hidden="true">&times;</span></button>

                                </div>

                                <div className="modal-body">
                                    <div className="form-group">
                                        <label>Nama Pegawai</label>
                                        <select  defaultValue={-1} name="user_Tambah" id="userTambah" className="browser-default custom-select" required>
                                            <option value="" disabled selected>Nama Pegawai</option>
                                            @foreach ($user as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div className="form-group">
                                        <label>Debit Lokasi</label>
                                        <input type="text"  className="form-control" id="debitloc_Tambah" name="debit_locTambah" placeholder="ex:Debit Bendung" required />

                                    </div>
                                    <div id="modal_error_message"></div>
                                    <div className="modal-footer">
                                        <button type="button" id="modal_tambah" onClick={this.tambah.bind(this)} className="btn btn-primary">Simpan</button>
                                        <button type="button" className="btn btn-danger" onClick={this.clearModalHide.bind(this)}>Batal</button>

                                    </div>
                                </div>


                            </div>
                        </div>
                    </form>
                </div>;

            }
        }
        class ModalEdit extends React.Component{
            constructor(props){
                super(props);
                this.handleSimpan = this.props.callback;
            }
            simpan = (e) => {
                console.log('bener', this.props);

                this.handleSimpan(this.props.data);
            }
            clearModalHide(e){
                $('#myModalEdit').modal('hide');
            }
            render() {
                return <div className="modal fade" id="myModalEdit" tabIndex="-1" role="dialog" aria-labelledby="myModalLabel" data-keyboard="false" data-backdrop="static">
                    <form method="POST" onSubmit={this.handleSimpan.bind(this)}>
                        <div className="modal-dialog" role="document">
                            <div className="modal-content">
                                <div className="modal-header">
                                    <h4 className="modal-title" id="myModalLabel" >Edit Debit Lokasi</h4>
                                    <button type="button" className="close" onClick={this.clearModalHide.bind(this)} data-toggle="dismiss"><span aria-hidden="true">&times;</span></button>

                                </div>

                                <div className="modal-body">
                                    <div className="form-group">
                                        <label>Nama Pegawai</label>
                                        <select  defaultValue={-1} name="user_Edit" id="userEdit" className="browser-default custom-select" required>
                                            <option value="" disabled selected>Nama Pegawai</option>
                                            @foreach ($user as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div className="form-group">
                                        <label>Debit Lokasi</label>
                                        <input type="text"  className="form-control" id="debitloc_Edit" name="debit_locEdit" placeholder="ex:Debit Bendung" required />

                                    </div>

                                    <div id="modal_error_message"></div>
                                    <div className="modal-footer">
                                        <button type="button" id="modal_edit" onClick={this.simpan.bind(this)} className="btn btn-primary">Simpan</button>
                                        <button type="button" className="btn btn-danger" onClick={this.clearModalHide.bind(this)}>Batal</button>

                                    </div>
                                </div>


                            </div>
                        </div>
                    </form>
                </div>;
            }
        }
        class HAHAHA extends React.Component{
            constructor(props){
                super(props);

                this.state = {
                    data : [],
                    tambahData : null,
                    singDiedit : null
                }
                this.modalEditRef = React.createRef();
                this.modalTambahRef = React.createRef();
                this.handleDelete.bind(this);
            }
            refresh = () => {
                this.componentDidMount();
            };
            componentDidMount(){
                let token = Cookies.get('token');

                fetch('/api/debitloc',{
                    method:'GET',
                    headers:{
                        'Accept':'application/json',
                        'Authorization' : 'Bearer '+token
                    }
                }).then(data => data.json()).then(response => {
                    this.setState({data:response.data});

                });
            }
            createForm=(item)=>{
                $('#myModalTambah form').attr('action', '/api/debitloc/store');
                let semuaOption = $('#userTambah option');
                $('#userTambah option').removeAttr('selected');
                for(let i =0;i<semuaOption.length;i++){
                    $('#userTambah').find('[value='+item.user_id+']').attr('selected','true');
                }

                $('#debitloc_Tambah').val();
                $('#myModalTambah').modal();
                this.setState({
                    tambahData : item
                });

            }

            updateForm = (item)=>{
                $('#myModalTambah form').attr('action', '/api/debitloc/update'+item.user_id);
                let semuaOption = $('#userEdit option');
                $('#userEdit option').removeAttr('selected');
                for(let i =0;i<semuaOption.length;i++){
                    $('#userEdit').find('[value='+item.user_id+']').attr('selected','true');
                }

                $('#debitloc_Edit').val(item.name);
                $('#myModalEdit').modal();
                this.setState({
                    singDiedit : item
                });
            }
            deleteForm = (item)=>{
                let that=this;
                if (confirm("Apakah anda yakin hapus data ?")) {
                    that.handleDelete(item);
                } else {
                    console.log('nooo')
                }
            }
            handleCreate(item){
                let that=this;

                console.log('cek',$("#userTambah").val());
                let token = Cookies.get('token');
                let form = new FormData();
                form.append('name',$("#debitloc_Tambah").val());
                form.append('user_id',$("#userTambah").val());
                fetch('/api/debitloc/store/',{
                    method:'POST',
                    headers:{
                        'Accept':'application/json',
                        'Authorization':'Bearer '+token
                    },
                    body : form
                }).then(response => response.json()).then(resp => {
                    console.log('hasil',resp);
                    $('#myModalTambah').modal('hide');
                    that.refresh();
                });
            }


            handleUpdate = (item) => {
                let that=this;
                console.log('cek',$("#userEdit").val());
                let token = Cookies.get('token');
                let form = new FormData();
                form.append('name',$("#debitloc_Edit").val());
                form.append('user_id',$("#userEdit").val());

                fetch('/api/debitloc/update/'+item.id,{
                    method:'POST',
                    headers:{
                        'Accept':'application/json',
                        'Authorization':'Bearer '+token
                    },
                    body : form
                }).then(response => response.json()).then(resp => {
                    console.log('hasil',resp);
                    $('#myModalEdit').modal('hide');
                    that.componentDidMount();
                });
            };
            handleDelete=(item)=>{

                let that=this;
                let token = Cookies.get('token');
                let form = new FormData();

                fetch('/api/debitloc/delete/'+item.id,{
                    method:'GET',
                    headers:{
                        'Accept':'application/json',
                        'Authorization':'Bearer '+token
                    }
                }).then(response => response.json()).then(resp => {
                    console.log('hasil',resp);

                    that.componentDidMount();
                });
            }

            render() {
                let that = this;
                return (
                    <div>
                        <button type="button" className="btn btn-primary btn-sm" onClick={that.createForm.bind(this)}>
                            Tambah Debit Lokasi
                        </button>
                        <table width="100%" className="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Nama Pekerja</th>
                                <th>Debit Lokasi</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>{this.state.data.map(function(item, key) {

                                return (
                                    <tr key = {key}>
                                        <td>{item.user.name}</td>
                                        <td>{item.name}</td>
                                        <td>
                                            <button className="btn btn-warning"  onClick={that.updateForm.bind(this,item)} id="modal_edit">Ubah</button>
                                            <button className="btn btn-danger" onClick={that.deleteForm.bind(this,item)} id="modal_hapus">Hapus</button>
                                        </td>
                                    </tr>
                                )

                            })}</tbody>
                        </table>
                        <ModalCreate ref={this.modalTambahRef} callback={this.handleCreate} data={this.state.tambahData}/>
                        <ModalEdit ref={this.modalEditRef} callback={this.handleUpdate} data={this.state.singDiedit}/>
                    </div>
                )

            }


        }
        ReactDOM.render(<HAHAHA/>, document.getElementById('dataCoba'));


    </script>
@endpush
