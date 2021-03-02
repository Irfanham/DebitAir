@extends('layouts.app', [ 'activePage' => 'pegawai', 'title' => __('Debit Air')])

@section('content')
    <div class="container" style="height: auto;">
        <div class="row ">
            <div class="col-xs-4">
                <h2 class="">Debit</h2>
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
                            Data Pegawai
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
                this.state={
                    type:"input",
                }
                this.showHide=this.showHide;
                this.handleTambah= this.props.callback;
            }
            showHide(e){
                e.preventDefault();
                e.stopPropagation();
                this.setState({
                    type: this.state.type === 'input' ? 'password' : 'input'
                })
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
                                    <h4 className="modal-title" id="myModalLabel" >Tambah Pegawai</h4>
                                    <button type="button" className="close" onClick={this.clearModalHide.bind(this)} data-toggle="dismiss"><span aria-hidden="true">&times;</span></button>

                                </div>

                                <div className="modal-body">
                                    <div className="form-group">
                                        <label>Nama Pegawai</label>
                                        <input type="text"  className="form-control" id="pegawaiTambah" name="pegawai_Tambah" placeholder="ex:Reno" required />
                                    </div>
                                    <div className="form-group">
                                        <label>Email</label>
                                        <input type="text"  className="form-control" id="emailTambah" name="email_Tambah" placeholder="ex:user@example.com" required />
                                    </div>
                                    <div className="form-group">
                                        <label>Password</label>
                                        <input type={this.state.type} className="form-control" id="passTambah" required/>
                                        <span className="pshow" onClick={this.showHide.bind(this)}>{this.state.type === 'input' ? 'Hide' : 'Show'}</span>
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
                this.state={
                    type:'input',
                }
                this.handleSimpan = this.props.callback;
                this.showHide = this.showHide;
            }
            simpan = (e) => {
                console.log('bener', this.props);

                this.handleSimpan(this.props.data);
            }
            showHide(e){
                e.preventDefault();
                e.stopPropagation();
                this.setState({
                    type: this.state.type === 'input' ? 'password' : 'input'
                })
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
                                    <h4 className="modal-title" id="myModalLabel" >Edit Debit</h4>
                                    <button type="button" className="close" onClick={this.clearModalHide.bind(this)} data-toggle="dismiss"><span aria-hidden="true">&times;</span></button>

                                </div>

                                <div className="modal-body">
                                    <div className="form-group">
                                        <label>Nama Pegawai</label>
                                        <input type="text"  className="form-control" id="pegawaiEdit" name="pegawai_Edit" placeholder="ex:500" required />
                                    </div>
                                    <div className="form-group">
                                        <label>Email</label>
                                        <input type="text"  className="form-control" id="emailEdit" name="email_Edit" placeholder="ex:user@example.com" required />
                                    </div>
                                    <div className="form-group">
                                        <label>Password</label>
                                        <input type={this.state.type} className="form-control" id="passEdit" required/>
                                        <span className="pshow" onClick={this.showHide.bind(this)}>{this.state.type === 'input' ? 'Hide' : 'Show'}</span>

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
                    singDiedit : null,

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

                fetch('/api/pegawai',{
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
                $('#pegawaiTambah').val();
                $('#emailTambah').val();
                $('#passTambah').val();
                $('#myModalTambah').modal();
                this.setState({
                    tambahData : item
                });

            }

            updateForm = (item)=>{

                $('#pegawaiEdit').val(item.name);
                $('#emailEdit').val(item.email);
                $('#passEdit').val();
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
            handleCreate(){
                let that=this;

                console.log('cek',$("#pegawaiTambah").val());
                let token = Cookies.get('token');
                let form = new FormData();

                form.append('name',$("#pegawaiTambah").val());
                form.append('email',$("#emailTambah").val());
                form.append('password',$("#passTambah").val());

                fetch('/api/pegawai/store',{
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
                console.log('cek',$("#passEdit").val());
                let token = Cookies.get('token');
                let form = new FormData();
                form.append('name',$("#pegawaiEdit").val());
                form.append('email',$("#emailEdit").val());
                form.append('password',$("#passEdit").val());
                fetch('/api/pegawai/update/'+item.id,{
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

                fetch('/api/pegawai/delete/'+item.id,{
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
                            Tambah Pegawai
                        </button>

                        <table width="100%" className="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Nama Pekerja</th>
                                <th>Email</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>{this.state.data.map(function(item, key) {

                                return (
                                    <tr key = {key}>
                                        <td>{item.name}</td>
                                        <td>{item.email}</td>
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
