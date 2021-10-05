@extends('client.base')
@section('main')
<body>
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
<link href="https://fontawesome.com/v5.15/icons/question-circle?style=solid">
    <section class="faq">
        <div class="container" data-aos="fade-up">
            <div class="section-titl">
                <h2>Les Questions les plus Fréquents</h2>
                <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi
                    quidem hic quas.</p>
            </div>
            <div class="faq-list"id="faq">           
                <ul> 
                @foreach($faqs as $faq)             
                    <li class="faqList">
                        <div class="question">
                            <i class="fas fa-question-circle"></i>
                            <h5>{{ $faq->titre }}?</h5>
                            <svg width="15" height="10" viewBox="0 0 42 25">
                                <path d="M3 3L21 21L39 3" stroke="white" stroke-width="7" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <div class="answer">
                            <p>
                            {{strip_tags( $faq->contenu )}}
                            </p>
                        </div>
                    </li>
                    @endforeach
                </ul>
            
            </div>
        </div>
    </section>
<script>
    const faqs = document.querySelectorAll(".faqList");
    faqs.forEach((faq) => {
    console.log(faq);
    faq.addEventListener("click", () => {
        faq.classList.toggle("active");
    });
});
</script>
</body>
@endsection