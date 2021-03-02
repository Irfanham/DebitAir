@extends('layouts.app', [ 'activePage' => 'debit-input', 'title' => __('Debit Air')])

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
                            Data Debit
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
                                    <h4 className="modal-title" id="myModalLabel" >Tambah Debit</h4>
                                    <button type="button" className="close" onClick={this.clearModalHide.bind(this)} data-toggle="dismiss"><span aria-hidden="true">&times;</span></button>

                                </div>

                                <div className="modal-body">
                                    <div className="form-group">
                                        <label>Debit Lokasi</label>
                                        <select ref="id_debitTambah" defaultValue={-1} name="debitloc_Tambah" id="debit_locTambah" className="browser-default custom-select" required>
                                            <option value="" disabled selected> Debit Lokasi</option>
                                            @foreach ($debit as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div className="form-group">
                                        <label>Debit (liter/jam) </label>
                                        <input type="text"  className="form-control" id="debitTambah" name="debit_Tambah" placeholder="ex:500" required />
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
                                    <h4 className="modal-title" id="myModalLabel" >Edit Debit</h4>
                                    <button type="button" className="close" onClick={this.clearModalHide.bind(this)} data-toggle="dismiss"><span aria-hidden="true">&times;</span></button>

                                </div>

                                <div className="modal-body">
                                    <div className="form-group">
                                        <label>Debit Lokasi</label>
                                        <select ref="id_debit" defaultValue={-1} name="debitloc_Edit" id="debit_locEdit" className="browser-default custom-select" required>
                                            <option value="" disabled selected> Debit Lokasi</option>
                                            @foreach ($debit as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div className="form-group">
                                        <label>Debit (liter/jam) </label>
                                        <input type="text"  className="form-control" id="debitEdit" name="debit_Edit" placeholder="ex:500" required />
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
                let bulan = $('[name=bulan] :selected').attr('value');
                let tahun = $('[name=tahun] :selected').attr('value');
                fetch('/api/debit?bulan='+bulan+'&tahun='+tahun,{
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
                $('#myModalTambah form').attr('action', '/api/debit/store');
                let semuaOption = $('#debit_locTambah option');
                $('#debit_locTambah option').removeAttr('selected');
                for(let i =0;i<semuaOption.length;i++){
                    $('#debit_locTambah').find('[value='+item.debit_location_id+']').attr('selected','true');
                }

                $('#debitTambah').val();
                $('#myModalTambah').modal();
                this.setState({
                    tambahData : item
                });

            }

            updateForm = (item)=>{

                $('#myModalEdit form').attr('action', '/api/debit/update/'+item.debit_location_id);
                let semuaOption = $('#debit_locEdit option');
                $('#debit_locEdit option').removeAttr('selected');
                for(let i =0;i<semuaOption.length;i++){
                    $('#debit_locEdit').find('[value='+item.debit_location_id+']').attr('selected','true');
                }

                $('#debitEdit').val(item.debit);


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

                console.log('cek',$("#debit_locTambah").val());
                let token = Cookies.get('token');
                let form = new FormData();
                form.append('debit_location_id',$("#debit_locTambah").val());
                form.append('debit',$("#debitTambah").val());


                fetch('/api/debit/store',{
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
            console.log('cek',$("#debit_locEdit").val());
            let token = Cookies.get('token');
            let form = new FormData();
            form.append('debit_location_id',$("#debit_locEdit").val());
            form.append('debit',$("#debitEdit").val());
            fetch('/api/debit/update/'+item.id,{
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

            fetch('/api/debit/delete/'+item.id,{
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
            let bulan = [];
            let tahun_time = JSON.parse('{!! json_encode($years) !!}');
            let tahun = [];
            for (let a=0; a<tahun_time.length;a++){
                tahun.push(<option value={tahun_time[a].tahun}>{tahun_time[a].tahun}</option>)
            }
            for (let a=0;a<12;a++){

                let temp = moment().set('month', a).format('MMMM');

                bulan.push(<option value={temp+' A'}  >{temp+' A'}</option>);
                bulan.push(<option value={temp+' B'}  >{temp+' B'}</option>);

            }
            return (
                <div>
                    <button type="button" className="btn btn-primary btn-sm" onClick={that.createForm.bind(this)}>
                        Tambah Debit
                    </button>
                    <div className="col-3 row mb-3">
                        <select name="bulan" className="browser-default custom-select" onChange={this.refresh.bind(this)}>
                            {bulan.map(i => (i))}
                        </select>
                    </div>
                    <div className="col-3 row mb-3">
                        <select name="tahun" className="browser-default custom-select" onChange={this.refresh.bind(this)}>
                            {tahun.map(i => (i))}
                        </select>
                    </div>

                    <table width="100%" className="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Nama Pekerja</th>

                            <th>Debit Lokasi</th>
                            <th>Debit</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>{this.state.data.map(function(item, key) {

                            return (
                                <tr key = {key}>
                                    <td>{moment(item.created_at).format('DD MMMM YYYY, H:mm:ss')}</td>
                                    <td>{item.user.name}</td>

                                    <td>{item.debit_location.name}</td>
                                    <td>{item.debit}</td>
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
