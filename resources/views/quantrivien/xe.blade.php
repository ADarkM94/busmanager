@extends("quantrivien.main")
@section("content")
    <div class="content xe show">
        <div id="bus"></div>
    </div>
    <a href="javascript:void(0)" onclick="window.open('{{url("admin/addxe")}}')" style="width: 2em; height: 2em; line-height: 2em; background: white; font-size: 1.5em; position: absolute; bottom: 1em; left: 2em; box-shadow: 0 0 5px black; border-radius: 50%;" title="Thêm  Xe">
        <i class="glyphicon glyphicon-plus"></i>
    </a>
    <a href="javascript:void(0)" onclick="refreshXE()" style="width: 2em; height: 2em; line-height: 2em; background: white; font-size: 1.5em; position: absolute; bottom: 4em; left: 2em; box-shadow: 0 0 5px black; border-radius: 50%;" title="Làm Mới">
        <i class="glyphicon glyphicon-refresh"></i>
    </a>
@endsection
@section("excontent")
@endsection
@section("script")
    <script>
        option = document.getElementsByClassName("option");
        for (var i = 0; i < option.length; i++) {
            option[i].classList.remove('selected');
        }
        option[6].classList.add('selected');
        option[6].getElementsByTagName('img')[0].setAttribute('src','{{asset("images/icons/bus-hover.png")}}');
        $(function () {
            var typebus = {!!json_encode($typebus)!!};
            var obj = {
                width: '100%',
                height: '100%',
                showTop: false,
                showBottom: false,
                collapsible: false,
                showHeader: true,
                filterModel: {on: true, mode: "AND", header: true},
                scrollModel: {autoFit: true},
                resizable: false,
                roundCorners: false,
                rowBorders: false,
                postRenderInterval: -1,
                hwrap: true,
                columnBorders: false,
                selectionModel: { type: 'row', mode: 'single' },
                numberCell: { show: false },
                stripeRows: false,
                cellDblClick: function (event,ui) {
                    window.open("{{url('/admin/addxe')}}" + "/" + ui.rowData["Mã"]);
                }
            };
            obj.colModel = [
                {
                    title: "ID",
                    width: 100,
                    dataIndx: "Mã",
                    dataType: "string",
                    editor: false,
                    align: 'center',
                    filter: {
                        type: 'textbox',
                        condition: 'contain',
                        listeners: ['keyup']
                    }
                },
                {
                    title: "Biển số",
                    width: 200,
                    dataIndx: "Biển_số",
                    dataType: "string",
                    editor: false,
                    align: 'center',
                    filter: {
                        type: 'textbox',
                        condition: 'contain',
                        listeners: ['keyup']
                    }
                },
                {
                    title: "Loại xe",
                    width: 70,
                    dataIndx: "Mã_loại_xe",
                    dataType: "string",
                    editor: false,
                    align: "center",
                    render: function (ui) {
                        return typebus[ui.rowData['Mã_loại_xe']];
                    },
                    filter: {
                        type: "select",
                        condition: "equal",
                        options: function (ui) {
                            var opts = [{ '': '[ All ]'}];
                            var properties = Object.getOwnPropertyNames(typebus);
                            for (var i = 0; i < properties.length; i++) {
                                var obj = {};
                                obj[properties[i]] = typebus[properties[i]];
                                opts.push(obj);
                            }
                            return opts;
                        },
                        listeners: ["change"]
                    }
                },
                {
                    title: "Loại ghế",
                    width: 100,
                    dataIndx: "Loại_ghế",
                    dataType: "string",
                    editor: false,
                    align: "center",
                    render: function(ui){
                        if(ui.rowData["Loại_ghế"]==0)
                            return "Ghế ngồi";
                        else if(ui.rowData["Loại_ghế"])
                            return "Giường nằm";
                    },
                    filter: {
                        type: 'select',
                        condition: 'equal',
                        listeners: ['change'],
                        options: [
                            {'':'[All]'},
                            {'0':'Ghế ngồi'},
                            {'1':'Giường nằm'}
                        ]
                    }
                },
                {
                    title: "Lần bảo trì gần nhất",
                    width: 200,
                    dataIndx: "Ngày_bảo_trì_gần_nhất",
                    dataType: "date",
                    editor: false,
                    align: 'center',
                    filter: {
                        type: 'textbox', condition: 'between', init: pqDatePicker,
                        listeners: [{
                            'change': function (evt, ui) {
                                if (ui.value != "") {
                                    var d1 = ui.value.split('/');
                                    ui.value = d1[2] + '/' + d1[0] + '/' + d1[1];
                                }
                                if (ui.value2 != "") {
                                    var d1 = ui.value2.split('/');
                                    ui.value2 = d1[2] + '/' + d1[0] + '/' + d1[1];
                                }
                                var $grid = $(this).closest(".pq-grid");
                                $grid.pqGrid("filter", {
                                    oper: 'add',
                                    data: [ui]
                                });
                            }
                        }]},
                    render: function(ui){
                        var cellData = ui.cellData;
                        var str = '';
                        if (cellData != "") {
                            var d1 = cellData.split('-');
                            str += d1[2] + '/' + d1[1] + '/' + d1[0];
                        }
                        return {text: str};
                    }
                },
                {
                    title: "Lần bảo trì tiếp theo",
                    width: 170,
                    dataIndx: "Ngày_bảo_trì_tiếp_theo",
                    dataType: "date",
                    editor: false,
                    align: 'center',
                    filter: {
                        type: 'textbox', condition: 'between', init: pqDatePicker,
                        listeners: [{
                            'change': function (evt, ui) {
                                if (ui.value != "") {
                                    var d1 = ui.value.split('/');
                                    ui.value = d1[2] + '/' + d1[0] + '/' + d1[1];
                                }
                                if (ui.value2 != "") {
                                    var d1 = ui.value2.split('/');
                                    ui.value2 = d1[2] + '/' + d1[0] + '/' + d1[1];
                                }
                                var $grid = $(this).closest(".pq-grid");
                                $grid.pqGrid("filter", {
                                    oper: 'add',
                                    data: [ui]
                                });
                            }
                        }]},
                    render: function(ui){
                        var cellData = ui.cellData;
                        var str = '';
                        if (cellData != "") {
                            var d1 = cellData.split('-');
                            str += d1[2] + '/' + d1[1] + '/' + d1[0];
                        }
                        return {text: str};
                    }
                },
                {
                    title: "Action",
                    width: 100,
                    editor: false,
                    dataIndx: "View",
                    render: function (ui) {
                        var str = '';
                        str += '<a title="Edit" id="idEditBus" ><i class="glyphicon glyphicon-edit  text-success" style="padding-right: 5px; cursor: pointer;"></i></a>';
                        str += '<a title="Delete" id="idDelBus" ><i class="glyphicon glyphicon-remove  text-danger" style="padding-right: 5px; cursor: pointer;"></i></a>';
                        return str;
                    },
                    postRender: function (ui) {
                        var rowData = ui.rowData,
                            $cell = this.getCell(ui);
                        //add button
                        $cell.find("a#idEditBus")
                            .unbind("click")
                            .bind("click", function (evt) {
                                window.open("{{url('admin/addxe')}}"+"/"+rowData["Mã"]);
                            });
                        $cell.find("a#idDelBus")
                            .unbind("click")
                            .bind("click", function (evt) {
                                if(confirm("Bạn chắc chắn muốn xóa?"))
                                    location.assign("{{url('admin/delxe')}}"+"/"+rowData["Mã"]);
                            });
                    }
                }
            ];

            obj.dataModel = {
                data: {!! json_encode($bus) !!},
                location: "local",
                sorting: "local",
                sortDir: "down"
            };
            obj.pageModel = {type: 'local', rPP: 20, rPPOptions: [20, 30, 40, 50]};
            var $grid = $("#bus").pqGrid(obj);
            $grid.pqGrid("refreshDataAndView");
        });
        function refreshXE(){
            $("#bus").pqGrid("reset",{filter : true});
        }
    </script>
@endsection