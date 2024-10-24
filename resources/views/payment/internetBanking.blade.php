<div class="modal fade" id="internetbankModal" tabindex="-1" role="dialog" aria-labelledby="internetbankModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title" id="internetbankModalLabel" style="text-align:center;">Internet Banking Payment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <form id="internetBankingForm">
                    <!-- internetBanking Selection with Images -->
                    <div class="form-group text-center">
                        <label for="internetBanking_choice">Choose your Bank:</label>
                        <div class="d-flex justify-content-between">
                            <div class="row">
                                <div class="col-md-4 col-sm-4">
                                    <div class="internetBanking-option">
                                        <input type="radio" name="internet banking" id="maybank" value="internetBanking" required>
                                        <label for="maybank">
                                            <img src="{{ asset('images/maybank.png') }}" alt="Maybank" class="img-fluid" width="100">
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="internetBanking-option">
                                        <input type="radio" name="internet banking" id="cimb" value="CIMB" required>
                                        <label for="CIMB">
                                            <img src="{{ asset('images/cimb.png') }}" alt="CIMB" class="img-fluid" width="100">
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="internetBanking-option">
                                        <input type="radio" name="internet banking" id="publicbank" value="publicbank" required>
                                        <label for="publicbank">
                                            <img src="{{ asset('images/publicbank.png') }}" alt="Public Bank" class="img-fluid" width="100">
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 col-sm-4">
                                    <div class="internetBanking-option">
                                        <input type="radio" name="internet banking" id="rhb" value="rhb" required>
                                        <label for="rhb">
                                            <img src="{{ asset('images/rhb.png') }}" alt="RHB" class="img-fluid" width="100">
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="internetBanking-option">
                                        <input type="radio" name="internet banking" id="hongleong" value="hongleong" required>
                                        <label for="hongleong">
                                            <img src="{{ asset('images/hongleong.png') }}" alt="Hong Leong" class="img-fluid" width="100">
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="internetBanking-option">
                                        <input type="radio" name="internet banking" id="ambank" value="ambank" required>
                                        <label for="ambank">
                                            <img src="{{ asset('images/ambank.png') }}" alt="Am Bank" class="img-fluid" width="100">
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 col-sm-4">
                                    <div class="internetBanking-option">
                                        <input type="radio" name="internet banking" id="hsbc" value="hsbc" required>
                                        <label for="hsbc">
                                            <img src="{{ asset('images/hsbc.png') }}" alt="HSBC" class="img-fluid" width="100">
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="internetBanking-option">
                                        <input type="radio" name="internet banking" id="affinbank" value="affinbank" required>
                                        <label for="affinbank">
                                            <img src="{{ asset('images/affinbank.png') }}" alt="Affin Bank" class="img-fluid" width="100">
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="internetBanking-option">
                                        <input type="radio" name="internet banking" id="alliancebank" value="alliancebank" required>
                                        <label for="alliancebank">
                                            <img src="{{ asset('images/alliancebank.png') }}" alt="Alliance Bank" class="img-fluid" width="100">
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 col-sm-4">
                                    <div class="internetBanking-option">
                                        <input type="radio" name="internet banking" id="uob" value="uob" required>
                                        <label for="uob">
                                            <img src="{{ asset('images/UOB.png') }}" alt="UOB" class="img-fluid" width="100">
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="internetBanking-option">
                                        <input type="radio" name="internet banking" id="ocbcbank" value="ocbcbank" required>
                                        <label for="ocbcbank">
                                            <img src="{{ asset('images/ocbc.png') }}" alt="OCBC Bank" class="img-fluid" width="100">
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="internetBanking-option">
                                        <input type="radio" name="internet banking" id="bankislam" value="bankislam" required>
                                        <label for="bankislam">
                                            <img src="{{ asset('images/bankislam.png') }}" alt="Bank Islam" class="img-fluid" width="100">
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 col-sm-4">
                                    <div class="internetBanking-option">
                                        <input type="radio" name="internet banking" id="bsn" value="bsn" required>
                                        <label for="bsn">
                                            <img src="{{ asset('images/bsn.png') }}" alt="BSN" class="img-fluid" width="100">
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="internetBanking-option">
                                        <input type="radio" name="internet banking" id="standardchartered" value="standardchartered" required>
                                        <label for="standardchartered">
                                            <img src="{{ asset('images/standard.png') }}" alt="Standard Chartered" class="img-fluid" width="100">
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="internetBanking-option">
                                        <input type="radio" name="internet banking" id="bankrakyat" value="bankrakyat" required>
                                        <label for="bankrakyat">
                                            <img src="{{ asset('images/bankrakyat.png') }}" alt="Bank Rakyat" class="img-fluid" width="100">
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 col-sm-4">
                                    <div class="internetBanking-option">
                                        <input type="radio" name="internet banking" id="bankmuamalat" value="bankmuamalat" required>
                                        <label for="bankmuamalat">
                                            <img src="{{ asset('images/bankmuamalat.png') }}" alt="Bank Muamalat" class="img-fluid" width="100">
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
                <button type="button" class="btn btn-primary" id="confirminternetbanking">Next</button>
            </div>
        </div>
    </div>
</div>


