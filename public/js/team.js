class Team{
    #translateNext = 0;

    constructor() {}

    translateNextRule = () => {
        $('.team-rule__control-next').click(() => {

            $('.team-rule__progress').css('transform', `translateX(-${100 + this.#translateNext}%)`);
            this.#translateNext += 100

            // console.log(this.#translateNext)
        })
    }

    translatePreviousRule = () => {
        $('.team-rule__control-previous').click(() => {
            if (this.#translateNext > 0) {
                this.#translateNext -= 100;
            }
            $('.team-rule__progress').css('transform', `translateX(-${this.#translateNext}%)`);

            console.log(this.#translateNext)
        })
    }

    translateReturn = () => {
        $('.team-rule__control-return').click(() => {
            this.#translateNext = 0;
            $('.team-rule__progress').css('transform', `translateX(-${this.#translateNext}%)`);
        })
    }
}

export default new Team;