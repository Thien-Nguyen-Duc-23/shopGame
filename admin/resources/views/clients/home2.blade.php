@extends('layouts.app')

@section('content')
    <section class="top-section-2 detail-page py-4">
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <div class="row ">
                        <div class="col-3 align-self-center">
                            <img class="w-100 rounded-circle border" src="https://khoroblox.vn/assets/images/unknown-avatar.jpg">
                        </div>
                        <div class="col-9 font-size-14px p-0 ">
                            <p class="text-sm-start m-0">
                                <b>ID:</b> 46684 
                            </p>
                            <p class="text-sm-start m-0">
                                <b>Số dư:</b>
                                <span class="text-danger fw-bold">0 đ</span>
                            </p>
                            <p class="text-sm-start m-0">
                                <b>Robux:</b>
                                <span class="text-danger fw-bold">0</span>
                            </p>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <span class="" style="top: -2px;">
                                <i class="tw-text-lg bx bxs-user"></i>
                            </span>
                            <span class="tw-ml-10 tw-block font-weight-size-600">Tài khoản </span>
                        </div>
                        <div class="col-12">
                            <div class="ps">
                                <ul style="list-style: none;font-size: 15px;font-weight: 500;">
                                    <a class="my-1 d-block color-inherit text-decoration-none">Thông tin chung</a>
                                    <a class="my-1 d-block color-inherit text-decoration-none">Hạng thành viên</a>
                                    <a class="my-1 d-block color-inherit text-decoration-none">Đổi mật khẩu</a>
                                    <a class="my-1 d-block color-inherit text-decoration-none">Dùng giftcode</a>
                                    <a class="my-1 d-block color-inherit text-decoration-none">Giới thiệu</a>
                                    <a class="my-1 d-block color-inherit text-decoration-none">Tài liệu API</a>
                                    <a class="my-1 d-block color-inherit text-decoration-none">Thông tin chung</a>
                                    <a class="my-1 d-block color-inherit text-decoration-none">Hạng thành viên</a>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <span class="" style="top: -2px;">
                                <i class="tw-text-lg bx bxs-game"></i>
                            </span>
                            <span class="tw-ml-10 tw-block fw-medium">Trò chơi </span>
                        </div>
                        <div class="col-12">
                            <div class="ps">
                                <ul style="list-style: none;font-size: 15px;font-weight: 500;">
                                    <a class="my-1 d-block color-inherit text-decoration-none">Rút vật phẩm</a>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <span class="" style="top: -2px;">
                                <i class="tw-text-lg bx bxs-wallet-alt"></i>
                            </span>
                            <span class="tw-ml-10 tw-block fw-medium {{ route('client.user.recharge') ? 'color-btn-239' : '' }}">Nạp tiền </span>
                        </div>
                        <div class="col-12">
                            <div class="ps">
                                <ul style="list-style: none;font-size: 15px;font-weight: 500;">
                                    <a class="my-1 d-block color-inherit text-decoration-none {{ route('client.user.recharge') ? 'color-btn-239' : '' }}">Nạp thẻ cào (tự động)</a>
                                    <a class="my-1 d-block color-inherit text-decoration-none">Nạp qua ATM/MOMO</a>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <span class="" style="top: -2px;">
                                <i class="tw-text-lg bx bxs-notepad"></i>
                            </span>
                            <span class="tw-ml-10 tw-block fw-medium">Lịch sử</span>
                        </div>
                        <div class="col-12">
                            <div class="ps">
                                <ul style="list-style: none;font-size: 15px;font-weight: 500;">
                                    <a class="my-1 d-block color-inherit text-decoration-none">Lịch sử chơi game</a>
                                    <a class="my-1 d-block color-inherit text-decoration-none">Lịch sử mua nick</a>
                                    <a class="my-1 d-block color-inherit text-decoration-none">Lịch sử mua vật phẩm</a>
                                    <a class="my-1 d-block color-inherit text-decoration-none">Lịch sử chuyển khoản</a>
                                    <a class="my-1 d-block color-inherit text-decoration-none">Lịch sử cày thuê</a>
                                    <a class="my-1 d-block color-inherit text-decoration-none">Lịch sử mua robux</a>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-10">
                  <div class="section p-4 background-color-245 rounde mb-3">
                    <div class="row">
                        <div>
                        <p class="font-weight-600 font-size-18px my-0">Nạp Thẻ Cào</p>
                        <p class="font-size-14px color-btn-239 my-0 font-weight-500">Tự động 24/7 - Nhập sai mệnh giá sẽ mất thẻ.</p>
                        </div>
                    </div>

                    <div class="charge">
                      <form action="#" class="charge-form">
                        <div class="row mb-4">
                            <div class="col-12 mt-3">
                                <p class="fw-bold color-btn-239">NẠP THẺ LỖI, VUI LÒNG LIÊN HỆ FANPAGE HỖ TRỢ.</p>
                            </div>
                            <div class="col-12">
                                <p class="font-size-14px">Nhà mạng <span class="fw-bold">(Ưu tiên Viettel, Vinaphone)</span></p>
                            </div>
                            <div class="charge-list">
                                <div class="charge-list_item relative d-flex align-items-center">
                                  <input type="radio" id="vt" name="type" value="Viettel" class="input-absolute">
                                  <label for="vt" class="px-3">
                                      <img src="https://khoroblox.vn/upload/card/viettel.png" class="img-fluid">
                                  </label>
                                </div>
                                <div class="charge-list_item relative d-flex align-items-center">
                                  <input type="radio" id="vn" name="type" value="Viettel" class="input-absolute">
                                  <label for="vn" class="px-3">
                                      <img src="https://khoroblox.vn/upload/card/vinaphone.png" class="img-fluid">
                                  </label>
                                </div>
                                <div class="charge-list_item relative d-flex align-items-center">
                                  <input type="radio" id="mb" name="type" value="Viettel" class="input-absolute">
                                  <label for="mb" class="px-3">
                                      <img src="https://trumthe.com/uploads/catalog/mobi-91f80ecf19.png" class="img-fluid">
                                  </label>
                                </div>
                                <div class="charge-list_item relative d-flex align-items-center">
                                  <input type="radio" id="gt" name="type" value="Viettel" class="input-absolute">
                                  <label for="gt" class="px-3">
                                      <img src="https://trumthe.com/uploads/catalog/gate-69139edfa3.png" class="img-fluid">
                                  </label>
                                </div>
                                <div class="charge-list_item relative d-flex align-items-center">
                                  <input type="radio" id="gn" name="type" value="Viettel" class="input-absolute">
                                  <label for="gn" class="px-3">
                                      <img src="https://trumthe.com/uploads/catalog/garena-5737b26bea.png" class="img-fluid">
                                  </label>
                                </div>
                                <div class="charge-list_item relative d-flex align-items-center">
                                  <input type="radio" id="zing" name="type" value="Viettel" class="input-absolute">
                                  <label for="zing" class="px-3">
                                      <img src="https://trumthe.com/uploads/catalog/zing-d18b76de81.png" class="img-fluid">
                                  </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                          <div class="col-12 mb-2">
                            <label class="form-label">Mệnh giá</label>
                            <select name="amount" class="form-select">
                              <option option value="" >Chọn mệnh giá</option>
                              <option class="tw-font-medium tw-text-red-600" value="10000">
                                  Thẻ 10,000đ (Sai mệnh giá mất thẻ)
                              </option>
                              <option class="tw-font-medium tw-text-red-600" value="20000">
                                  Thẻ 20,000đ (Sai mệnh giá mất thẻ)
                              </option>
                              <option class="tw-font-medium tw-text-red-600" value="30000">
                                  Thẻ 30,000đ (Sai mệnh giá mất thẻ)
                              </option>
                              <option class="tw-font-medium tw-text-red-600" value="50000">
                                  Thẻ 50,000đ (Sai mệnh giá mất thẻ)
                              </option>
                              <option class="tw-font-medium tw-text-red-600" value="100000">
                                  Thẻ 100,000đ (Sai mệnh giá mất thẻ)
                              </option>
                              <option class="tw-font-medium tw-text-red-600" value="200000">
                                  Thẻ 200,000đ (Sai mệnh giá mất thẻ)
                              </option>
                              <option class="tw-font-medium tw-text-red-600" value="300000">
                                  Thẻ 300,000đ (Sai mệnh giá mất thẻ)
                              </option> 
                              <option class="tw-font-medium tw-text-red-600" value="500000">
                                  Thẻ 500,000đ (Sai mệnh giá mất thẻ)
                              </option>
                              <option class="tw-font-medium tw-text-red-600" value="1000000">
                                  Thẻ 1,000,000đ (Sai mệnh giá mất thẻ)
                              </option>
                            </select>
                          </div>
                          <div class="col-12 mb-2">
                            <label class="form-label">Mã thẻ</label>
                            <input type="text" name="code" class="form-control" id="inputCity">
                          </div>
                          <div class="col-12 mb-2">
                            <label class="form-label">Serial thẻ</label>
                            <input type="text" name="serial" class="form-control" id="inputCity">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-4">
                            <button button type="button" class="btn btn-danger">Nạp thẻ</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>

                  <div class="section charge-note p-2 background-color-245 rounded mb-3">
                    <div class="row">
                      <div class="col-12">
                        <p>Lưu ý: </p>
                        <p>- Vui lòng nạp đúng mệnh giá, sai mệnh giá sẽ không được cộng tiền vào tài khoản.<br>- Thẻ cào bị treo ĐANG XỬ LÝ quá 10p kể từ lúc nạp thẻ xin vui lòng liên hện page để được hỗ trợ.</p>
                      </div>
                    </div>
                  </div>

                  <div class="section p-4 charge-history background-color-245 rounded">
                    <div class="row">
                      <div class="border-bottom">
                        <h2 class="fw-bold">Thẻ Nạp Gần Nhất</h2>
                        <p class="charge-history_desc">Thẻ sẽ được duyệt từ trong 30 giây, sai mệnh giá = mất thẻ, gặp lỗi liên hệ fanpage ngay nhé!</p>
                        <table class="table table-striped">
                          <thead class="background-color-gray">
                            <tr>
                              <th scope="col">Thẻ Nạp</th>
                              <th scope="col">Mã thẻ/Seri</th>
                              <th scope="col">M.giá/T.nhận</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>Text</td>
                              <td>Text</td>
                              <td>Text</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </section>
@endsection
