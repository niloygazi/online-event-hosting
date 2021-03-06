<div class="container bootstrap snippets bootdey">
    <div class="row">
      <div class="profile-nav col-md-3">
          <div class="panel">
              <div class="user-heading round">
                @foreach($hostPhoto as $hostPhoto)
                  <a href="#">
                      <img src="{{$hostPhoto->photo_location}}" alt="">
                  </a>
                @endforeach
                  <button name="submit" type="submit" class="submit" style="width: 100%; margin-top: 9px;" data-toggle="modal" data-target="#HostProfilePictureModal" >Update Profile Picture</button>
              </div>
          </div>
      </div>
      <div class="profile-info col-md-9">
          <div class="panel">
              <div class="panel-body bio-graph-info" style="padding: 55px;">

                <b> <h1 style="color: white; font-weight: bolder;">Profile Type :<span style="color: #ff5518;font-weight: bolder;"> Host</span></h1></b>

                @foreach ($HostData as $HostData)

                  <div class="row">
                      <div class="bio-row">
                          <p style="color: white"><span style="color: white">Name </span>: {{$HostData->name}}</p>
                      </div>
                      <div class="bio-row">
                          <p style="color: white"><span style="color: white">Email </span>: {{$HostData->email}}</p>
                      </div>

                      <div class="bio-row">
                        <p style="color: white"><span style="color: white">Address</span>: {{$HostData->address}}</p>
                    </div>

                      <div class="bio-row">
                          <p style="color: white"><span style="color: white">Phone</span>: {{$HostData->phone_number}}</p>
                      </div>

                      <div class="row">
                        <div class="col-md-4">
                        <button name="submit" type="submit" id="hostEditBtnClick" data-id="{{$HostData->id}}" data-toggle="modal" data-target="#HostProfileModal" class="submit" style="width: 100%">Update Profile</button>
                      </div>
                      <div class="col-md-4">
                          <button name="submit" type="submit" data-toggle="modal" data-target="#HostChngPasswordModal" class="submit" style="width: 100%">Change Password</button>
                                </div>

                      <div class="col-md-4">
                        <a href="{{'/logout'}}"><button onclick="flushmsg()" type="submit" class="submit" style="width: 100%">Logout</button></a>
                      </div>

                  </div>
                  </div>
                @endforeach
              </div>
          </div>



      </div>


    </div>

    <div class="panel">
        <div class="panel-body bio-graph-info">
          <center><button type="submit" class="submit" data-toggle="modal" data-target="#AddEventModal" style="width: 30%; margin-bottom: 8px;">Add Events</button></center>
          <b> <h1 style="color: white">Your Hosted Events</h1></b>
            <div class="limiter">
                <div class="row">
                    <div class="col-md-12 p-3">
                        <div class="table100">
                            <table id="EventShowTable" >
                                <thead>
                                    <tr class="table100-head">
                                        <th class="column1">Event Name</th>
                                        <th class="column1">Event Type</th>
                                        <th class="column2">Event Time</th>
                                        <th class="column3">Venue</th>
                                        <th class="column4">Registration Amount</th>
                                        <th class="column5">Last Date</th>
                                        <th class="column5">Approval</th>
                                        <th class="column6">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="event_show">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>

    <div class="panel">
        <div class="panel-body bio-graph-info">
            <b> <h1 style="color: white">Your Registered Events</h1></b>

            <div class="limiter">

                        <div class="table100">
                            <table id="RegisteredEventShowTableforHost">
                                <thead>
                                    <tr class="table100-head">
                                        <th class="column1">Event Name</th>
                                        <th class="column2">Event Time</th>
                                        <th class="column3">Venue</th>
                                        <th class="column4">Payment Amount</th>
                                        <th class="column4">Host Name</th>
                                        <th class="column4">Host Number</th>
                                        <th class="column5">Confirmation Status</th>
                                        <th class="column6">Invitation Card</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach ($hostRegisterdEvents as $hostRegisterdEvents)
                                        <tr>
                                            <td>{{$hostRegisterdEvents->event_name}}</td>
                                            <td>{{$hostRegisterdEvents->event_date}}</td>
                                            <td>{{$hostRegisterdEvents->event_venue}}</td>
                                            <td>{{$hostRegisterdEvents->event_registration_fee}}</td>
                                            <td>{{$hostRegisterdEvents->name}}</td>
                                            <td>{{$hostRegisterdEvents->phone_number}}</td>
                                            <td>{{$hostRegisterdEvents->stutus}}</td>
                                            <td>
                                              @if($hostRegisterdEvents->stutus == "Approved")
                                              <a href="{{'/generate-pdf'}}?id={{$hostRegisterdEvents->event_id}}" class="submit" style="padding: 10px;">Download Invitation Card</a> 
                                              @elseif ($hostRegisterdEvents->stutus == "Rejected")
                                              {{-- <p><abbr title="Your Request is Rejected. Please contact with Host if You Think this is a Mistake" class="initialism">Request Rejected</abbr></p> --}}
                                              @else
                                              <p>Request Pending</p>
                                              @endif
                                            </td>
                                        </tr>
                                  @endforeach
                                </tbody>
                            </table>
                        </div>
            </div>

        </div>
    </div>


    {{--Host Profile Update Modal --}}
<div class="modal fade" id="HostProfileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content" style="background-color: #464646">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Update Profile</h5>

        </div>
        <div class="modal-body" >
          <input type="hidden" id="host_id">
          <input id="HostNameUpdateId" type="text" class="form-control mb-3" placeholder="Name" style="background-color: #464646; color: white;">
          <input id="HostEmailUpdateId" type="text" class="form-control mb-3" placeholder="Email" style="background-color: #464646; color: white;">
          <input id="HostAddressUpdateId" type="text" class="form-control mb-3" placeholder="Address" style="background-color: #464646; color: white;">
          <input id="HostPhoneUpdateId" onclick="notify()" type="text" class="form-control mb-3" placeholder="Phone Number" style="background-color: #464646; color: white;" readonly>
         <br>
         {{-- <center><span style="color: white">Upload Profile Picture </span></center>
         <input class="form-control mb-3" id="imgInput" type="file" style="background-color: #464646; color: white;">
        <img class="imgPreview mt-3" id="imgPreview" src="{{asset('images/default-image.png')}}"> --}}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" id="HostUpdateConfirm" class="btn btn-primary">Update</button>
        </div>
      </div>
    </div>
  </div>


    {{--Host Profile picture Update Modal --}}
<div class="modal fade" id="HostProfilePictureModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content" style="background-color: #464646">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Update Profile Picture</h5>

        </div>
        <div class="modal-body" >
         <br>
         <center><span style="color: white">Upload Profile Picture </span></center>
         <input class="form-control mb-3" id="imgInput" type="file" style="background-color: #464646; color: white;">
        <img class="imgPreview mt-3" id="imgPreview" src="{{asset('images/default-image.png')}}">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" id="SaveProfilePhoto" class="btn btn-primary">Upload</button>
        </div>
      </div>
    </div>
  </div>


    {{--Host Change Password Modal --}}
@foreach ($HostData as $HostData)

    <div class="modal fade" id="HostChngPasswordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content" style="background-color: #464646">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Change Password</h5>

            </div>
            <div class="modal-body" >
                <input type="hidden" id="host_phone_no" name="" value="{{$value}}">
                <input id="host_old_pass" type="text" class="form-control mb-3" placeholder="Old Password" style="background-color: #464646; color: white;">
                <input id="host_new_pass" type="text" class="form-control mb-3" placeholder="New Password" style="background-color: #464646; color: white;">
              <input id="host_conNewPass" type="text" class="form-control mb-3" placeholder="Confirm New Password" style="background-color: #464646; color: white;">

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" id="host_confirm_pass" class="btn btn-primary">Confirm</button>
            </div>
          </div>
        </div>
      </div>

      @endforeach


{{-- Add Event Modal --}}

    <div class="modal fade" id="AddEventModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle">
        <div class="modal-dialog" role="document">
          <div class="modal-content" style="background-color: #464646">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Add Event</h5>

            </div>
            <div class="modal-body" >
                <input id="EventNameId" type="text" class="form-control mb-3" placeholder="Event Name" style="background-color: #464646; color: white;">
                <textarea id="EventDesID" class="form-control mb-3" placeholder="Event Description"  maxlength="3000" style="min-width: 100%; background-color: #464646; color: white; margin-top: 5px; margin-bottom: 5px;"></textarea>
                <span style="color: white;">Choose Your Event Type</span>
                <select id="EventTypeId" name="event type" class="form-control mb-3" style="background-color: #464646; color: white; margin-top: 5px; margin-bottom: 5px;">
                    <option value="Reunion">Reunion</option>
                    <option value="Seminar">Seminar</option>
                </select>

                <span style="color: white;">Choose Payment Option</span>
                <select id="PaymentMethodID" class="form-control mb-3" style="background-color: #464646; color: white; margin-top: 5px; margin-bottom: 5px;">
                    <option value="Bkash">Bkash</option>
                    <option value="Nagad">Nagad</option>
                    <option value="Rocket">Rocket</option>
                </select>

                <span style="color: white">Account Number </span>
                <input id="AccountNumberID" type="number" class="form-control mb-3" placeholder="Enter Account Number" style="background-color: #464646; color: white;">
            <div class="row">
                <div class="col-md-6">
                <span style="color: white">Select Event Time </span>
                <input id="EventTimeId" type="time" name="time" class="form-control mb-3" placeholder="Event Time" style="background-color: #464646; color: white;">
            </div>
            <div class="col-md-6">
                <span style="color: white">Select Event Date </span>
                <input id="EventDateId" type="date" class="form-control mb-3" placeholder="Event Date" style="background-color: #464646; color: white;">
            </div>
            </div>

            <input id="EventVenueId" type="text" class="form-control mb-3" placeholder="Venue" style="background-color: #464646; color: white;">
            <input id="EventRegAmountId" type="text" class="form-control mb-3" placeholder="Event Registration Amount" style="background-color: #464646; color: white; margin-bottom:5px;">
            <span style="color: white;">Registration Last Date</span>
            <input id="EventRegLastDateId" type="date" class="form-control mb-3" placeholder="Event Registration Last Date" style="background-color: #464646; color: white;">

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" id="saveEventBtnID" class="btn btn-primary">Create Event</button>
            </div>
          </div>
        </div>
      </div>



      {{-- Edit Event Modal --}}

      <div class="modal fade" id="EditEventModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content" style="background-color: #464646">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Update Event Information</h5>

            </div>
            <div class="modal-body" >
              <input type="hidden" id="event_id">
                <input disabled id="EditEventNameId" type="text" class="form-control mb-3" placeholder="Event Name" style="background-color: #464646; color: white;">
                <textarea id="EditEventDesID" class="form-control mb-3" placeholder="Event Description"  maxlength="3000" style="min-width: 100%; background-color: #464646; color: white; margin-top: 5px; margin-bottom: 5px;"></textarea>
                <span style="color: white;">Update Your Event Type</span>
                <select id="EditEventTypeId" name="event type" class="form-control mb-3" style="background-color: #464646; color: white; margin-top: 5px; margin-bottom: 5px;">
                    <option value="Reunion">Reunion</option>
                    <option value="Seminar">Seminar</option>
                </select>
                <span style="color: white;">Choose Payment Option</span>
                <select id="EditPaymentMethodID" class="form-control mb-3" style="background-color: #464646; color: white; margin-top: 5px; margin-bottom: 5px;">
                    <option value="Bkash">Bkash</option>
                    <option value="Nagad">Nagad</option>
                    <option value="Rocket">Rocket</option>
                </select>

                <span style="color: white">Account Number </span>
                <input id="EditAccountNumberID" type="number" class="form-control mb-3" placeholder="Enter Account Number" style="background-color: #464646; color: white;">
            <div class="row">
                <div class="col-md-6">
                <span style="color: white">Update Event Time </span>
                <input id="EditEventTimeId" type="time" class="form-control mb-3" placeholder="Event Time" style="background-color: #464646; color: white;">
            </div>
            <div class="col-md-6">
                <span style="color: white">Update Event Date </span>
                <input id="EditEventDateId" type="date" class="form-control mb-3" placeholder="Event Date" style="background-color: #464646; color: white;">
            </div>
            </div>

            <input id="EditEventVenueId" type="text" class="form-control mb-3" placeholder="Venue" style="background-color: #464646; color: white;">
            <input id="EditEventRegAmountId" type="text" class="form-control mb-3" placeholder="Event Registration Amount" style="background-color: #464646; color: white; margin-bottom:5px;">
            <span style="color: white;">Update Registration Last Date</span>
            <input id="EditEventRegLastDateId" type="date" class="form-control mb-3" placeholder="Event Registration Last Date" style="background-color: #464646; color: white;">

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" id="confirmEditEventBtnID" class="btn btn-primary">Update Event</button>
            </div>
          </div>
        </div>
      </div>


      {{-- Delete Modal --}}

      <div class="modal fade" id="DeleteEventModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content" style="background-color: #464646">
            <div class="modal-body" >
                <h4 style="color: white;">Do you want to delete?</h4>
                <h5 id="EventDeleteID" class=""></h5>
            </div>
            <div class="modal-footer">
              <input type='hidden' id='deleteEventID'>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
              <button type="button" id="DeleteEventBtnID" class="btn btn-primary">Yes</button>
            </div>
          </div>
        </div>
      </div>

    </div>
    <script>
        function flushmsg(){
            flash('Successfully Logout',{'bgColor' : '#00b859'});
        }

        $('#imgInput').change(function () {
            var reader=new FileReader();
            reader.readAsDataURL(this.files[0]);
            reader.onload=function (event) {
               var ImgSource= event.target.result;
                $('#imgPreview').attr('src',ImgSource)
            }
        })

        function notify()
        {
          flash('Phone Number is Not Changeable.',{'bgColor' : '#f74134'});
        }
    </script>
