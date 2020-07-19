<button type="button" class="btn btn-white pt-3 pl-1 pr-1 position-fixed " data-toggle="modal" data-target="#TimKiem" id="search_icon">
        <img src="images/search.png">
</button>


<div class="modal fade" id="TimKiem" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tìm kiếm thông tin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body text-right ">
                    <form class="form" action="" method="POST">
                        <div class="form-group">
                            <div>
                                <input type="text" class="form-control input-lg" name="txtInfo"  placeholder="Search" >
                            </div>
                        </div>
                        <br>
                        <div class="form-group ">
                            <div>
                                <button type="submit" class="btn btn-success">
                                    Search
                                </button>
                            </div>
                        </div>
                    </form>
                    
                </div>
        </div>
    </div>
</div>
