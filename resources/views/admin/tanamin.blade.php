@extends('layouts.app', [ 'activePage' => 'tanamin', 'title' => __('Debit Air')])

@section('content')
    <div class="container" style="height: auto;">
        <div class="row ">
            <div class="col-xs-4">
                <h2 class="">Tanam Input</h2>
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
                            Data Tanam
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
                                    <h4 className="modal-title" id="myModalLabel" >Tambah Tanam</h4>
                                    <button type="button" className="close" onClick={this.clearModalHide.bind(this)} data-toggle="dismiss"><span aria-hidden="true">&times;</span></button>

                                </div>

                                <div className="modal-body">
                                    <div className="form-group">
                                        <label>Jenis Tanaman</label>
                                        <select defaultValue={-1} name="jenis_Tambah" id="jenisTambah" className="browser-default custom-select" required>
                                            <option value="" disabled selected>Jenis Tanaman</option>
                                            @foreach ($tanam as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div><div className="form-group">
                                        <label>Periode Tanam</label>
                                    <input type="text"  className="form-control" id="periodeTambah" name="periode_Tambah" placeholder="ex:1/2/3" required />
                                </div>
                                    <div className="form-group">
                                        <label>Value</label>
                                        <input type="text"  className="form-control" id="valueTambah" name="value_Tambah" placeholder="ex:500" required />
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
                                    <h4 className="modal-title" id="myModalLabel" >Edit Tanam</h4>
                                    <button type="button" className="close" onClick={this.clearModalHide.bind(this)} data-toggle="dismiss"><span aria-hidden="true">&times;</span></button>

                                </div>

                                <div className="modal-body">
                                    <div className="form-group">
                                        <label>Jenis Tanaman</label>
                                        <select  defaultValue={-1} name="tanam_Edit" id="tanamEdit" className="browser-default custom-select" required>
                                            <option value="" disabled selected>Jenis Tanaman</option>
                                            @foreach ($tanam as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div className="form-group">
                                        <label>Value</label>
                                        <input type="text"  className="form-control" id="valueEdit" name="value_Edit" placeholder="ex:500" required />
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
                fetch('/api/tanamin?bulan='+bulan+'&tahun='+tahun,{
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
                $('#myModalTambah form').attr('action', '/api/tanamin/store');
                let semuaOption = $('#jenisTambah option');
                $('#jenisTambah option').removeAttr('selected');
                for(let i =0;i<semuaOption.length;i++){
                    $('#jenisTambah').find('[value='+item.id+']').attr('selected','true');
                }
                $('#periode Tambah').val();
                $('#valueTambah').val();
                $('#myModalTambah').modal();
                this.setState({
                    tambahData : item
                });

            }

            updateForm = (item)=>{

                $('#myModalEdit form').attr('action', '/api/tanamin/update/'+item.tanamin);
                let semuaOption = $('#tanamEdit option');
                $('#tanamEdit option').removeAttr('selected');
                for(let i =0;i<semuaOption.length;i++){
                    $('#tanamEdit').find('[value='+item.tanamin+']').attr('selected','true');
                }

                $('#valueEdit').val(item.value);


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

                console.log('cek',$("#jenisTambah").val());
                let token = Cookies.get('token');
                let form = new FormData();
                form.append('tanam_id',$("#jenisTambah").val());
                form.append('tanam_period',$("#periodeTambah").val());
                form.append('value',$("#valueTambah").val());


                fetch('/api/tanamin/store',{
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
                console.log('cek',$("#jenisEdit").val());
                let token = Cookies.get('token');
                let form = new FormData();
                form.append('tanam_id',$("#jenisEdit").val());
                form.append('value',$("#valueEdit").val());
                fetch('/api/tanamin/update/'+item.id,{
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

                fetch('/api/tanamin/delete/'+item.id,{
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
                                <th>Jenis Tanaman</th>
                                <th>Periode Tanam</th>
                                <th>Waktu Periode Tanam</th>
                                <th>Value</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>{this.state.data.map(function(item, key) {

                                return (
                                    <tr key = {key}>
                                        <td>{moment(item.created_at).format('DD MMMM YYYY, H:mm:ss')}</td>
                                        <td>{item.tanam.name}</td>
                                        <td>{item.tanam_period}</td>
                                        <td>{item.tanam_period_time}</td>
                                        <td>{item.value}</td>
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
