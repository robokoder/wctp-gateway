<div class="modal fade" data-backdrop="static" id="setupInstructionsModal" tabindex="-1" role="dialog" aria-labelledby="setupInstructionsModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content shadow-sm">
            <div class="modal-header border-bottom-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <dl class="row">
                    <dt class="text-dark col-4 text-center">Name</dt>
                    <dd class="col-8 text-left"><small>ArbitraryName</small></dd>

                    <dt class="text-dark col-4 text-center">Address</dt>
                    <dd class="col-8 text-left"><small>{{ secure_url('/wctp') }}</small></dd>

                    <dt class="text-dark col-4 text-center">Sender ID</dt>
                    <dd class="col-8 text-left"><small>&lt;senderId&gt;</small></dd>

                    <dt class="text-dark col-4 text-center">Security Code</dt>
                    <dd class="col-8 text-left"><small>&lt;securityCode&gt;</small></dd>

                    <dt class="text-dark col-4 text-center">Inbound Behavior</dt>
                    <dd class="col-8 text-left"><small>2-Way</small></dd>

                    <dt class="text-dark col-4 text-center">Outbound Behavior</dt>
                    <dd class="col-8 text-left"><small>2-Way</small></dd>

                    <dt class="text-dark col-4 text-center">Provider Name</dt>
                    <dd class="col-8 text-left"><small>ArbitraryProviderName<sup class="text-primary font-weight-bolder">*</sup></small></dd>
                </dl>
                <p class="text-muted mb-2">
                    <sup class="text-primary font-weight-bolder">*</sup> <small>
                        <i class="font-weight-bold">ArbitraryProviderName</i> is matched in the WCTP Web web.config file to map incoming SMS messages to the correct provider.
                        Multiple instances of WCTP Web are required to support multiple providers - contact Amtelco for licensing information.
                    </small>
                </p>

                <img class="rounded img-thumbnail img-fluid" alt="Setup Example Screenshot" title="Intelligent Series WCTP setup" src="/images/setup-example.png">

            </div>
            <div class="modal-footer border-top-0">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
