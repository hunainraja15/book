@extends('book.index')
@section('content')
    <div class="container mt-5">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Upload Book</h5>
                <small class="text-muted float-end">Merged input group</small>
            </div>
            <div class="card-body">
                <form action="{{route('book.store')}}" class="form" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-fullname">Title</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text"><i
                                    class='bx bx-sort-a-z'></i></span>
                            <input type="text" class="form-control" name="title" placeholder=" The name of the book" />
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-fullname">Author</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class='bx bx-user-pin'></i></span>
                            <input type="text" class="form-control" name="author" placeholder="The author(s) of the book" />
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-fullname">ISBN</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class='bx bx-food-menu'></i></span>
                            <input type="text" class="form-control" name="isbn" placeholder="The International Standard Book Number for the book" />
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-fullname">Publisher</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class='bx bx-user'></i></span>
                            <input type="text" class="form-control" name="publisher" placeholder="The name of the publisher" />
                        </div>
                    </div>
 
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-fullname">Publication Date</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class='bx bx-calendar-exclamation' ></i></span>
                            <input type="date" class="form-control" name="publication_date" placeholder="The date the book was published" />
                        </div>
                    </div>
 
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-fullname">Edition</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class='bx bx-book' ></i></span>
                            <input type="text" class="form-control" name="edition" placeholder="The edition of the book (if applicable)" />
                        </div>
                    </div>
 
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-fullname">Language</label>
                        
                        <div class="input-group input-group-merge">
                           
                                    <select id="select2-example" name="language" class="form-control" >
                                        <option value="afrikaans">Afrikaans</option>
                                        <option value="albanian">Albanian</option>
                                        <option value="amharic">Amharic</option>
                                        <option value="arabic">Arabic</option>
                                        <option value="armenian">Armenian</option>
                                        <option value="azerbaijani">Azerbaijani</option>
                                        <option value="basque">Basque</option>
                                        <option value="belarusian">Belarusian</option>
                                        <option value="bengali">Bengali</option>
                                        <option value="bosnian">Bosnian</option>
                                        <option value="bulgarian">Bulgarian</option>
                                        <option value="catalan">Catalan</option>
                                        <option value="cebuano">Cebuano</option>
                                        <option value="chichewa">Chichewa</option>
                                        <option value="chinese">Chinese (Simplified)</option>
                                        <option value="chinese">Chinese (Traditional)</option>
                                        <option value="corsican">Corsican</option>
                                        <option value="croatian">Croatian</option>
                                        <option value="czech">Czech</option>
                                        <option value="danish">Danish</option>
                                        <option value="dutch">Dutch</option>
                                        <option value="english">English</option>
                                        <option value="esperanto">Esperanto</option>
                                        <option value="estonian">Estonian</option>
                                        <option value="filipino">Filipino</option>
                                        <option value="finnish">Finnish</option>
                                        <option value="french">French</option>
                                        <option value="frisian">Frisian</option>
                                        <option value="galician">Galician</option>
                                        <option value="georgian">Georgian</option>
                                        <option value="german">German</option>
                                        <option value="greek">Greek</option>
                                        <option value="gujarati">Gujarati</option>
                                        <option value="haitian creole">Haitian Creole</option>
                                        <option value="hausa">Hausa</option>
                                        <option value="hawaiian">Hawaiian</option>
                                        <option value="hebrew">Hebrew</option>
                                        <option value="hindi">Hindi</option>
                                        <option value="hmong">Hmong</option>
                                        <option value="hungarian">Hungarian</option>
                                        <option value="icelandic">Icelandic</option>
                                        <option value="igbo">Igbo</option>
                                        <option value="indonesian">Indonesian</option>
                                        <option value="irish">Irish</option>
                                        <option value="italian">Italian</option>
                                        <option value="japanese">Japanese</option>
                                        <option value="javanese">Javanese</option>
                                        <option value="kannada">Kannada</option>
                                        <option value="kazakh">Kazakh</option>
                                        <option value="khmer">Khmer</option>
                                        <option value="kinyarwanda">Kinyarwanda</option>
                                        <option value="korean">Korean</option>
                                        <option value="kurdish (kurmanji)">Kurdish (Kurmanji)</option>
                                        <option value="kyrgyz">Kyrgyz</option>
                                        <option value="lao">Lao</option>
                                        <option value="latin">Latin</option>
                                        <option value="latvian">Latvian</option>
                                        <option value="lithuanian">Lithuanian</option>
                                        <option value="luxembourgish">Luxembourgish</option>
                                        <option value="macedonian">Macedonian</option>
                                        <option value="malagasy">Malagasy</option>
                                        <option value="malay">Malay</option>
                                        <option value="malayalam">Malayalam</option>
                                        <option value="maltese">Maltese</option>
                                        <option value="maori">Maori</option>
                                        <option value="marathi">Marathi</option>
                                        <option value="mongolian">Mongolian</option>
                                        <option value="myanmar">Myanmar (Burmese)</option>
                                        <option value="nepali">Nepali</option>
                                        <option value="norwegian">Norwegian</option>
                                        <option value="odia">Odia (Oriya)</option>
                                        <option value="pashto">Pashto</option>
                                        <option value="persian">Persian</option>
                                        <option value="polish">Polish</option>
                                        <option value="portuguese">Portuguese</option>
                                        <option value="punjabi">Punjabi</option>
                                        <option value="romanian">Romanian</option>
                                        <option value="russian">Russian</option>
                                        <option value="samoan">Samoan</option>
                                        <option value="scots gaelic">Scots Gaelic</option>
                                        <option value="serbian">Serbian</option>
                                        <option value="sesotho">Sesotho</option>
                                        <option value="shona">Shona</option>
                                        <option value="sindhi">Sindhi</option>
                                        <option value="sinhala">Sinhala</option>
                                        <option value="slovak">Slovak</option>
                                        <option value="slovenian">Slovenian</option>
                                        <option value="somali">Somali</option>
                                        <option value="spanish">Spanish</option>
                                        <option value="sundanese">Sundanese</option>
                                        <option value="swahili">Swahili</option>
                                        <option value="swedish">Swedish</option>
                                        <option value="tajik">Tajik</option>
                                        <option value="tamil">Tamil</option>
                                        <option value="tatar">Tatar</option>
                                        <option value="telugu">Telugu</option>
                                        <option value="thai">Thai</option>
                                        <option value="turkish">Turkish</option>
                                        <option value="turkmen">Turkmen</option>
                                        <option value="ukrainian">Ukrainian</option>
                                        <option value="urdu">Urdu</option>
                                        <option value="uyghur">Uyghur</option>
                                        <option value="uzbek">Uzbek</option>
                                        <option value="vietnamese">Vietnamese</option>
                                        <option value="welsh">Welsh</option>
                                        <option value="xhosa">Xhosa</option>
                                        <option value="yiddish">Yiddish</option>
                                        <option value="yoruba">Yoruba</option>
                                        <option value="zulu">Zulu</option>
                                    </select>
                        </div>
                    </div>
 
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-fullname">Pages</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class='bx bx-book-open' ></i></span>
                            <input type="text" class="form-control" name="pages" placeholder="The total number of pages in the book" />
                        </div>
                    </div>
 
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-fullname">Description</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class='bx bxs-book-content' ></i></span>
                            <textarea type="text" class="form-control" name="description" placeholder="A brief summary or description of the book" ></textarea>
                        </div>
                    </div>
 
                    <div class="input-group mb-3">
                        <span class="input-group-text">$</span>
                        <input type="text" class="form-control" name="price" placeholder="The price of the book (if selling it)" aria-label="Amount (to the nearest dollar)">
                        <span class="input-group-text">.00</span>
                      </div>

                      <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-fullname">Availability Status</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class='bx bx-stats' ></i> </span>
                            {{-- <input type="text" class="form-control" name="availability_status" placeholder="Whether the book is in stock, out of stock, or available for pre-order" /> --}}
                            <select name="availability_status" class="form-control" id="availability_status">
                                <option value="">select status</option>
                                <option value="in_stock">in stock</option>
                                <option value="out_of_stock">out of stock</option>
                            </select>
                        </div>
                    </div>
 

                    <button type="submit" class="btn btn-primary">Send</button>
                </form>
            </div>
        </div>
    </div>
@endsection
