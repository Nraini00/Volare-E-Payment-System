<div class="modal fade" id="ewalletModal" tabindex="-1" role="dialog" aria-labelledby="ewalletModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title" id="ewalletModalLabel" style="text-align:center;">eWallet Payment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <form id="ewalletForm">
                    <!-- eWallet Selection with Images -->
                    <div class="form-group text-center">
                        <label for="ewallet_choice">Choose your eWallet:</label>
                        <div class="d-flex justify-content-between">
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="ewallet-option">
                                        <input type="radio" name="ewallet" id="tng" value="tng" required>
                                        <label for="tng">
                                            <img src="{{ asset('images/tng.png') }}" alt="Touch n Go" class="img-fluid" width="100">
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="ewallet-option">
                                        <input type="radio" name="ewallet" id="grabpay" value="grabpay" required>
                                        <label for="grabpay">
                                            <img src="{{ asset('images/grabpay.png') }}" alt="Grab Pay" class="img-fluid" width="100">
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="ewallet-option">
                                        <input type="radio" name="ewallet" id="favepay" value="favepay" required>
                                        <label for="favepay">
                                            <img src="{{ asset('images/favepay.png') }}" alt="Fave Pay" class="img-fluid" width="100">
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="ewallet-option">
                                        <input type="radio" name="ewallet" id="wechat" value="wechat" required>
                                        <label for="wechat">
                                            <img src="{{ asset('images/wechat.png') }}" alt="WeChat" class="img-fluid" width="100">
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="ewallet-option">
                                        <input type="radio" name="ewallet" id="alipay" value="alipay" required>
                                        <label for="alipay">
                                            <img src="{{ asset('images/alipay.png') }}" alt="Alipay" class="img-fluid" width="100">
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="confirmewallet">Next</button>
            </div>
        </div>
    </div>
</div>

<!-- Optional CSS to style the images -->
<style>
    .ewallet-option {
        margin: 0 10px;
        text-align: center;
    }
    .ewallet-option img {
        cursor: pointer;
        border: 2px solid transparent;
        border-radius: 10px;
        transition: border-color 0.3s ease;
    }
    .ewallet-option input[type="radio"]:checked + label img {
        border-color: #007bff;
    }
</style>
