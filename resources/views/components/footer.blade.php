<!-- FOOTER -->

<div class="footer_box">
    <div class="container">
        <footer class="py-5 footer_design">
            <div class="row">
                <div class="col-6 col-md-2 mb-3">
                    <h5>AggFitness</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="{{ route('info') }}" class="nav-link p-0 text-muted">Главная</a>
                        </li>
                        <li class="nav-item mb-2"><a href="{{ route('trainers.index', ['tag_id' => 0]) }}"
                                class="nav-link p-0 text-muted">Тренеры</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">О нас</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Контакты</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Фитнесс залы</a>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Команда
                                разработчиков</a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-5 offset-md-1 mb-3">
                    <form>
                        <h5>Подпишитесь на нашу рассылку</h5>
                        <p>Узнайте первым о наших скидках и акциях</p>
                        <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                            <label for="newsletter1" class="visually-hidden">Email address</label>
                            <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
                            <button class="btn btn-outline-success" type="button">Подписаться</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
                <p>&copy; {{ date('Y') }} AggFitness, частное приложение. Все права защищены</p>
            </div>
        </footer>
    </div>
</div>
