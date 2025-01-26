<div class="modal fade" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" id="{{ $id }}" aria-labelledby="{{ $id }}Label">
    <div class="modal-dialog modal-dialog-centered modal-{{ $size }}" role="document">
        <div class="modal-content rounded-4 shadow">
            <div class="modal-header row p-5 pb-4 border-bottom-0">
                <div class="col-6 mb-0">
                    <div class="row">
                        <div class="col-12">
                            <h1 id="{{ $id }}Label" class="mb-2 fs-2">{{ $title }}</h1>
                        </div>
                    </div>
                    @if($showStatusBadge || $showRemainingDays)
                    <div class="row">
                        @if($showStatusBadge)
                        <div class="col-12 col-sm-7 col-lg-4 col-xl-3">
                            <div id="status_title_badge" class="d-none">
                                {{-- Imprimir el badge con un estatus --}}
                            </div>
                            <div id="status_title_placeholder">
                                <p class="placeholder-glow" aria-hidden="true">
                                    <span class="placeholder col-12"></span>
                                </p>
                            </div>
                        </div>
                        @endif
                        @if($showRemainingDays)
                        <div class="col-12 col-sm-5 col-lg-4 col-xl-3">
                            <div id="remaining_days_badge" class="d-none"></div>
                            <div id="remaining_days_placeholder">
                                <p class="placeholder-glow" aria-hidden="true">
                                    <span class="placeholder col-12"></span>
                                </p>
                            </div>
                        </div>
                        @endif
                    </div>
                    @endif
                </div>
                @if($showTopAction)
                <div id="accion_top_wrapper" class="col-5 align-self-start d-none d-sm-flex justify-content-end ms-auto">
                    {{ $topAction }}
                </div>
                @endif
                @if ($showCloseButton)
                <div id="close-button-wrapper" class="col-1 d-flex justify-content-end align-items-start align-self-stretch ms-auto no-print">
                    <button type="button" class="btn-close mt-1 m-0" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                @endif
            </div>

            <div class="modal-body p-5 pb-4 pt-3">
                {{ $slot }}
            </div>
                
            @if($showFooter)
            <div class="modal-footer px-5">
                {{ $footer }}
            </div>
            @endif
        </div>
    </div>
</div>