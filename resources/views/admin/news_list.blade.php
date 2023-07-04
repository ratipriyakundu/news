<x-header />
<link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">

<x-side_menu />
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper ">
    <div class=" offset-0 card col-md-12">
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>News Title</th>
                        <th>Category</th>
                        <th>Sub-Category</th>
                        <th>News Date</th>
                        <th>Latest News</th>
                        <th>Popular</th>
                        <th>Added By</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($news as $nws)
                        <tr>
                            <td>{{ Str::limit($nws->title, 100, '...') }}</td>

                            <td>
                                @php
                                    $categories = $nws->category;
                                    $cats = explode(',', $categories);
                                    $category = \App\Models\Category::whereIn('id', $cats)->get();
                                    foreach ($category as $ct) {
                                        echo $ct->title . '<br>';
                                    }
                                @endphp

                            </td>
                            <td>
                                @php
                                    $subcategories = $nws->subcategory;
                                    if ($subcategories != '') {
                                        $subcats = explode(',', $subcategories);
                                        $subcategory = \App\Models\Subcategory::whereIn('id', $subcats)->get();
                                        foreach ($subcategory as $sct) {
                                            echo $sct->title . '<br>';
                                        }
                                    } else {
                                        echo '---';
                                    }
                                @endphp


                            </td>
                            <td>{{ $nws->news_date }}


                            </td>
                            <td>
                                @if ($nws->latest_news == 0)
                                    <i onclick="LatestNews('{{ $nws->id }}','{{ $nws->latest_news }}')"
                                        class="fa fa-toggle-off fa-2x"></i>
                                @else
                                    <i onclick="LatestNews('{{ $nws->id }}','{{ $nws->latest_news }}')"
                                        class="fa fa-toggle-on fa-2x"></i>
                                @endif
                            </td>


                            <td>

                                @if ($nws->popular == 0)
                                    <i onclick="ChangePopular('{{ $nws->id }}','{{ $nws->popular }}')"
                                        class="fa fa-toggle-off fa-2x"></i>
                                @else
                                    <i onclick="ChangePopular({{ $nws->id }},{{ $nws->popular }})"
                                        class="fa fa-toggle-on fa-2x"></i>
                                @endif
                            </td>

                            <td>
                                @php
                                    $added_by = DB::table('admins')
                                        ->where('id', $nws->added_by)
                                        ->first();
                                    echo $added_by->name;
                                @endphp

                            </td>

                            <td>
                                <a href="{{ route('edit-news') }}?id={{ $nws->id }}"><i
                                        class="fa fa-edit"></i></a>
                                <i onclick="RemoveNews('{{ $nws->id }}')" class="fa fa-trash"></i>


                            </td>

                        </tr>
                    @endforeach
                </tbody>
                </thead>
            </table>
        </div>



    </div>
</div>
</div>

</div>
</div>



</div>
</div>


</div>

</div>

</div>



</div>
<!-- /.card-body -->


</form>
</div>





</div>
<div class="modal" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form method="post">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <input type="hidden" name="category_id" id="category_id">
                        <label for="recipient-name" class="form-control-label">Category Title:</label>
                        <input type="text" class="form-control" name="title" id="category_title" required>
                    </div>


                </div>
                <div class="modal-footer">

                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
    </form>
</div>
</div>





<x-footer />
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>

<script src="https://cdn.datatables.net/fixedheader/3.2.3/js/dataTables.fixedHeader.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>



<script>
    function RemoveNews(id) {
        var response = confirm("Are you sure want to delete this news?");
        if (response) {
            $.post("{{ route('delete-news') }}", {
                id: id,
                '_token': '{{ csrf_token() }}'
            }, function(result) {

                window.location.reload();
            });
        }
    }

    $(document).ready(function() {
        // Setup - add a text input to each footer cell
        $('#example thead tr')
            .clone(true)
            .addClass('filters')
            .appendTo('#example thead');

        var table = $('#example').DataTable({
            orderCellsTop: true,
            fixedHeader: false,
            responsive: true,
            initComplete: function() {
                var api = this.api();

                // For each column
                api
                    .columns()
                    .eq(0)
                    .each(function(colIdx) {
                        // Set the header cell to contain the input element
                        var cell = $('.filters th').eq(
                            $(api.column(colIdx).header()).index()
                        );
                        var title = $(cell).text();
                        $(cell).html('<input type="text" placeholder="' + title + '" />');

                        // On every keypress in this input
                        $(
                                'input',
                                $('.filters th').eq($(api.column(colIdx).header()).index())
                            )
                            .off('keyup change')
                            .on('change', function(e) {
                                // Get the search value
                                $(this).attr('title', $(this).val());
                                var regexr =
                                    '({search})'; //$(this).parents('th').find('select').val();

                                var cursorPosition = this.selectionStart;
                                // Search the column for that value
                                api
                                    .column(colIdx)
                                    .search(
                                        this.value != '' ?
                                        regexr.replace('{search}', '(((' + this.value +
                                            ')))') :
                                        '',
                                        this.value != '',
                                        this.value == ''
                                    )
                                    .draw();
                            })
                            .on('keyup', function(e) {
                                e.stopPropagation();

                                $(this).trigger('change');
                                $(this)
                                    .focus()[0]
                                    .setSelectionRange(cursorPosition, cursorPosition);
                            });
                    });
            },
        });
    });




    function LatestNews(id, status) {
        if (status == 1) {
            $text = "Hide";
        }
        if (status == 0) {
            $text = "Show";
        }
        if (confirm("Do you really want to " + $text + "  Latest News?")) {


            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }

            $.post("{{ route('ChangeLatestStatus') }}", {
                id: id,
                status: status,
                '_token': '{{ csrf_token() }}'
            }, function(result) {

                //toastr.success("{{ session('success', 'Latest News Status Updated successfully.') }}");
                setTimeout(function() {
                    window.location.reload();
                }, 5000);

            });


        }
    }


    function ChangePopular(id, status) {
        if (status == 1) {
            $text = "Hide";
        }
        if (status == 0) {
            $text = "Show";
        }
        if (confirm("Do you really want to " + $text + "  Popular News?")) {


            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }

            $.post("{{ route('ChangePopular') }}", {
                id: id,
                status: status,
                '_token': '{{ csrf_token() }}'
            }, function(result) {

                //toastr.success("{{ session('success', 'Latest News Status Updated successfully.') }}");
                setTimeout(function() {
                    window.location.reload();
                }, 5000);

            });


        }

    }
</script>
