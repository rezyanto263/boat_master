<!-- Content Section Start -->
<section class="content-section">
    <div class="container-fluid 100vh p-5">
        <div class="table-content shadow">
            <div class="table-header w-100 gap-3 d-flex flex-row">
                <button class="btn btn-primary w-100" href="#" data-bs-toggle="modal" data-bs-target="#addbooking">
                    <i class="fa-solid fa-circle-plus me-1"></i>
                    ADD
                </button>
                <div class="modal fade" id="addbooking" data-bs-backdrop="static" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">ADD DATA</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row gy-3">
                                <div class="col-6">
                                    <label>Customer</label>
                                    <input type="text" placeholder="Customer Name">
                                </div>
                                <div class="col-6">
                                    <label>Customer</label>
                                    <input type="text" placeholder="Customer Name">
                                </div>
                                <div class="col-6">
                                    <label>Customer</label>
                                    <input type="text" placeholder="Customer Name">
                                </div>
                                <div class="col-6">
                                    <label>Customer</label>
                                    <input type="text" placeholder="Customer Name">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CLOSE</button>
                            <button type="button" class="btn btn-primary">ADD</button>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <table id="datatable" class="display table table-striped my-3" style="width:100%">
                <thead>
                    <tr>
                        <th class="text-start">Name</th>
                        <th class="text-start">Position</th>
                        <th class="text-start">Office</th>
                        <th class="text-start">Age</th>
                        <th class="text-start">Date</th>
                        <th class="text-start">Salary</th>
                        <th class="text-start">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Yuri Berry</td>
                        <td>Chief Marketing Officer (CMO)</td>
                        <td>New York</td>
                        <td>40</td>
                        <td>2009-06-25</td>
                        <td>$675,000</td>
                        <td class="text-end d-flex justify-content-end flex-row gap-1">
                        <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#delbooking">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editbooking">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Caesar Vance</td>
                        <td>Pre-Sales Support</td>
                        <td>New York</td>
                        <td>21</td>
                        <td>2011-12-12</td>
                        <td>$106,450</td>
                        <td class="text-end d-flex justify-content-end flex-row gap-1">
                        <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#delbooking">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editbooking">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Doris Wilder</td>
                        <td>Sales Assistant</td>
                        <td>Sydney</td>
                        <td>23</td>
                        <td>2010-09-20</td>
                        <td>$85,600</td>
                        <td class="text-end d-flex justify-content-end flex-row gap-1">
                        <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#delbooking">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editbooking">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Angelica Ramos</td>
                        <td>Chief Executive Officer (CEO)</td>
                        <td>London</td>
                        <td>47</td>
                        <td>2009-10-09</td>
                        <td>$1,200,000</td>
                        <td class="text-end d-flex justify-content-end flex-row gap-1">
                        <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#delbooking">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editbooking">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Gavin Joyce</td>
                        <td>Developer</td>
                        <td>Edinburgh</td>
                        <td>42</td>
                        <td>2010-12-22</td>
                        <td>$92,575</td>
                        <td class="text-end d-flex justify-content-end flex-row gap-1">
                        <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#delbooking">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editbooking">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Jennifer Chang</td>
                        <td>Regional Director</td>
                        <td>Singapore</td>
                        <td>28</td>
                        <td>2010-11-14</td>
                        <td>$357,650</td>
                        <td class="text-end d-flex justify-content-end flex-row gap-1">
                        <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#delbooking">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editbooking">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Brenden Wagner</td>
                        <td>Software Engineer</td>
                        <td>San Francisco</td>
                        <td>28</td>
                        <td>2011-06-07</td>
                        <td>$206,850</td>
                        <td class="text-end d-flex justify-content-end flex-row gap-1">
                        <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#delbooking">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editbooking">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Fiona Green</td>
                        <td>Chief Operating Officer (COO)</td>
                        <td>San Francisco</td>
                        <td>48</td>
                        <td>2010-03-11</td>
                        <td>$850,000</td>
                        <td class="text-end d-flex justify-content-end flex-row gap-1">
                        <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#delbooking">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editbooking">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Shou Itou</td>
                        <td>Regional Marketing</td>
                        <td>Tokyo</td>
                        <td>20</td>
                        <td>2011-08-14</td>
                        <td>$163,000</td>
                        <td class="text-end d-flex justify-content-end flex-row gap-1">
                        <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#delbooking">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editbooking">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Michelle House</td>
                        <td>Integration Specialist</td>
                        <td>Sydney</td>
                        <td>37</td>
                        <td>2011-06-02</td>
                        <td>$95,400</td>
                        <td class="text-end d-flex justify-content-end flex-row gap-1">
                        <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#delbooking">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editbooking">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Suki Burks</td>
                        <td>Developer</td>
                        <td>London</td>
                        <td>53</td>
                        <td>2009-10-22</td>
                        <td>$114,500</td>
                        <td class="text-end d-flex justify-content-end flex-row gap-1">
                        <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#delbooking">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editbooking">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Prescott Bartlett</td>
                        <td>Technical Author</td>
                        <td>London</td>
                        <td>27</td>
                        <td>2011-05-07</td>
                        <td>$145,000</td>
                        <td class="text-end d-flex justify-content-end flex-row gap-1">
                        <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#delbooking">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editbooking">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Gavin Cortez</td>
                        <td>Team Leader</td>
                        <td>San Francisco</td>
                        <td>22</td>
                        <td>2008-10-26</td>
                        <td>$235,500</td>
                        <td class="text-end d-flex justify-content-end flex-row gap-1">
                        <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#delbooking">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editbooking">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Martena Mccray</td>
                        <td>Post-Sales support</td>
                        <td>Edinburgh</td>
                        <td>46</td>
                        <td>2011-03-09</td>
                        <td>$324,050</td>
                        <td class="text-end d-flex justify-content-end flex-row gap-1">
                        <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#delbooking">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editbooking">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Unity Butler</td>
                        <td>Marketing Designer</td>
                        <td>San Francisco</td>
                        <td>47</td>
                        <td>2009-12-09</td>
                        <td>$85,675</td>
                        <td class="text-end d-flex justify-content-end flex-row gap-1">
                        <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#delbooking">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editbooking">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Howard Hatfield</td>
                        <td>Office Manager</td>
                        <td>San Francisco</td>
                        <td>51</td>
                        <td>2008-12-16</td>
                        <td>$164,500</td>
                        <td class="text-end d-flex justify-content-end flex-row gap-1">
                        <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#delbooking">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editbooking">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Hope Fuentes</td>
                        <td>Secretary</td>
                        <td>San Francisco</td>
                        <td>41</td>
                        <td>2010-02-12</td>
                        <td>$109,850</td>
                        <td class="text-end d-flex justify-content-end flex-row gap-1">
                        <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#delbooking">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editbooking">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Vivian Harrell</td>
                        <td>Financial Controller</td>
                        <td>San Francisco</td>
                        <td>62</td>
                        <td>2009-02-14</td>
                        <td>$452,500</td>
                        <td class="text-end d-flex justify-content-end flex-row gap-1">
                        <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#delbooking">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editbooking">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Timothy Mooney</td>
                        <td>Office Manager</td>
                        <td>London</td>
                        <td>37</td>
                        <td>2008-12-11</td>
                        <td>$136,200</td>
                        <td class="text-end d-flex justify-content-end flex-row gap-1">
                        <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#delbooking">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editbooking">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Jackson Bradshaw</td>
                        <td>Director</td>
                        <td>New York</td>
                        <td>65</td>
                        <td>2008-09-26</td>
                        <td>$645,750</td>
                        <td class="text-end d-flex justify-content-end flex-row gap-1">
                        <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#delbooking">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editbooking">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Olivia Liang</td>
                        <td>Support Engineer</td>
                        <td>Singapore</td>
                        <td>64</td>
                        <td>2011-02-03</td>
                        <td>$234,500</td>
                        <td class="text-end d-flex justify-content-end flex-row gap-1">
                        <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#delbooking">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editbooking">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Bruno Nash</td>
                        <td>Software Engineer</td>
                        <td>London</td>
                        <td>38</td>
                        <td>2011-05-03</td>
                        <td>$163,500</td>
                        <td class="text-end d-flex justify-content-end flex-row gap-1">
                        <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#delbooking">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editbooking">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Sakura Yamamoto</td>
                        <td>Support Engineer</td>
                        <td>Tokyo</td>
                        <td>37</td>
                        <td>2009-08-19</td>
                        <td>$139,575</td>
                        <td class="text-end d-flex justify-content-end flex-row gap-1">
                        <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#delbooking">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editbooking">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Thor Walton</td>
                        <td>Developer</td>
                        <td>New York</td>
                        <td>61</td>
                        <td>2013-08-11</td>
                        <td>$98,540</td>
                        <td class="text-end d-flex justify-content-end flex-row gap-1">
                        <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#delbooking">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editbooking">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Finn Camacho</td>
                        <td>Support Engineer</td>
                        <td>San Francisco</td>
                        <td>47</td>
                        <td>2009-07-07</td>
                        <td>$87,500</td>
                        <td class="text-end d-flex justify-content-end flex-row gap-1">
                        <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#delbooking">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editbooking">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Serge Baldwin</td>
                        <td>Data Coordinator</td>
                        <td>Singapore</td>
                        <td>64</td>
                        <td>2012-04-09</td>
                        <td>$138,575</td>
                        <td class="text-end d-flex justify-content-end flex-row gap-1">
                        <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#delbooking">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editbooking">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Zenaida Frank</td>
                        <td>Software Engineer</td>
                        <td>New York</td>
                        <td>63</td>
                        <td>2010-01-04</td>
                        <td>$125,250</td>
                        <td class="text-end d-flex justify-content-end flex-row gap-1">
                        <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#delbooking">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editbooking">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Zorita Serrano</td>
                        <td>Software Engineer</td>
                        <td>San Francisco</td>
                        <td>56</td>
                        <td>2012-06-01</td>
                        <td>$115,000</td>
                        <td class="text-end d-flex justify-content-end flex-row gap-1">
                        <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#delbooking">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editbooking">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Jennifer Acosta</td>
                        <td>Junior Javascript Developer</td>
                        <td>Edinburgh</td>
                        <td>43</td>
                        <td>2013-02-01</td>
                        <td>$75,650</td>
                        <td class="text-end d-flex justify-content-end flex-row gap-1">
                        <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#delbooking">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editbooking">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Cara Stevens</td>
                        <td>Sales Assistant</td>
                        <td>New York</td>
                        <td>46</td>
                        <td>2011-12-06</td>
                        <td>$145,600</td>
                        <td class="text-end d-flex justify-content-end flex-row gap-1">
                        <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#delbooking">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editbooking">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Hermione Butler</td>
                        <td>Regional Director</td>
                        <td>London</td>
                        <td>47</td>
                        <td>2011-03-21</td>
                        <td>$356,250</td>
                        <td class="text-end d-flex justify-content-end flex-row gap-1">
                        <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#delbooking">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editbooking">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Lael Greer</td>
                        <td>Systems Administrator</td>
                        <td>London</td>
                        <td>21</td>
                        <td>2009-02-27</td>
                        <td>$103,500</td>
                        <td class="text-end d-flex justify-content-end flex-row gap-1">
                        <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#delbooking">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editbooking">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Jonas Alexander</td>
                        <td>Developer</td>
                        <td>San Francisco</td>
                        <td>30</td>
                        <td>2010-07-14</td>
                        <td>$86,500</td>
                        <td class="text-end d-flex justify-content-end flex-row gap-1">
                        <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#delbooking">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editbooking">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Shad Decker</td>
                        <td>Regional Director</td>
                        <td>Edinburgh</td>
                        <td>51</td>
                        <td>2008-11-13</td>
                        <td>$183,000</td>
                        <td class="text-end d-flex justify-content-end flex-row gap-1">
                        <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#delbooking">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editbooking">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Michael Bruce</td>
                        <td>Javascript Developer</td>
                        <td>Singapore</td>
                        <td>29</td>
                        <td>2011-06-27</td>
                        <td>$183,000</td>
                        <td class="text-end d-flex justify-content-end flex-row gap-1">
                        <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#delbooking">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editbooking">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Donna Snider</td>
                        <td>Customer Support</td>
                        <td>New York</td>
                        <td>27</td>
                        <td>2011-01-25</td>
                        <td>$112,000</td>
                        <td class="text-end d-flex justify-content-end flex-row gap-1">
                        <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#delbooking">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editbooking">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</section>
<!-- Content Section End -->