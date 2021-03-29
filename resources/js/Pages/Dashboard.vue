<template>
    <breeze-authenticated-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Users survey
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">

                        <div class="mb-4" v-if="user.survey && currentStep < 3">
                            <div class="rounded-md bg-red-50 p-4">
                              <div class="flex">
                                <div class="flex-shrink-0">
                                  <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                  </svg>
                                </div>
                                <div class="ml-3">
                                  <h3 class="text-sm font-medium text-red-800">
                                    You're already completed the survey! Repeating it will override current results.
                                  </h3>
                                </div>
                              </div>
                            </div>
                        </div>

                        <div>
                            <nav aria-label="Progress" class="mb-4">
                              <ol class="border border-gray-300 rounded-md divide-y divide-gray-300 md:flex md:divide-y-0">
                                <li class="relative md:flex-1 md:flex">
                                  <a href="#" class="px-6 py-4 flex items-center text-sm font-medium" aria-current="step">
                                    <span class="flex-shrink-0 w-10 h-10 flex items-center border-indigo-600 justify-center border-2 rounded-full">
                                      <span v-if="currentStep === 1" class="text-indigo-600">01</span>
                                      <span v-if="completedSteps.includes(1)" class="flex-shrink-0 w-10 h-10 flex items-center justify-center bg-indigo-600 rounded-full group-hover:bg-indigo-800">
                                          <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                          </svg>
                                      </span>
                                    </span>
                                    <span class="ml-4 text-sm font-medium text-indigo-600">Part 1</span>
                                  </a>

                                  <!-- Arrow separator for lg screens and up -->
                                  <div class="hidden md:block absolute top-0 right-0 h-full w-5" aria-hidden="true">
                                    <svg class="h-full w-full text-gray-300" viewBox="0 0 22 80" fill="none" preserveAspectRatio="none">
                                      <path d="M0 -2L20 40L0 82" vector-effect="non-scaling-stroke" stroke="currentcolor" stroke-linejoin="round" />
                                    </svg>
                                  </div>
                                </li>

                                <li class="relative md:flex-1 md:flex">
                                  <a v-if="!completedSteps.includes(2) && currentStep !== 2" href="#" class="group flex items-center">
                                    <span class="px-6 py-4 flex items-center text-sm font-medium">
                                      <span class="flex-shrink-0 w-10 h-10 flex items-center justify-center border-2 border-gray-300 rounded-full group-hover:border-gray-400">
                                        <span class="text-gray-500 group-hover:text-gray-900">02</span>
                                      </span>
                                      <span class="ml-4 text-sm font-medium text-gray-500 group-hover:text-gray-900">Part 2</span>
                                    </span>
                                  </a>
                                  <a href="#" class="px-6 py-4 flex items-center text-sm font-medium" aria-current="step">
                                    <template v-if="currentStep === 2">
                                        <span class="flex-shrink-0 w-10 h-10 flex items-center justify-center border-2 border-indigo-600 rounded-full">
                                            <span class="text-indigo-600">02</span>
                                        </span>
                                        <span class="ml-4 text-sm font-medium text-indigo-600">Part 2</span>
                                    </template>
                                    <template v-if="completedSteps.includes(2)">
                                        <span class="flex-shrink-0 w-10 h-10 flex items-center justify-center bg-indigo-600 rounded-full group-hover:bg-indigo-800">
                                            <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                              <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                        <span class="ml-4 text-sm font-medium text-indigo-600">Part 2</span>
                                    </template>
                                  </a>

                                  <!-- Arrow separator for lg screens and up -->
                                  <div class="hidden md:block absolute top-0 right-0 h-full w-5" aria-hidden="true">
                                    <svg class="h-full w-full text-gray-300" viewBox="0 0 22 80" fill="none" preserveAspectRatio="none">
                                      <path d="M0 -2L20 40L0 82" vector-effect="non-scaling-stroke" stroke="currentcolor" stroke-linejoin="round" />
                                    </svg>
                                  </div>
                                </li>

                                <li class="relative md:flex-1 md:flex">
                                  <a v-if="!completedSteps.includes(3) && currentStep !== 3" href="#" class="group flex items-center">
                                    <span class="px-6 py-4 flex items-center text-sm font-medium">
                                      <span class="flex-shrink-0 w-10 h-10 flex items-center justify-center border-2 border-gray-300 rounded-full group-hover:border-gray-400">
                                        <span class="text-gray-500 group-hover:text-gray-900">03</span>
                                      </span>
                                      <span class="ml-4 text-sm font-medium text-gray-500 group-hover:text-gray-900">Results</span>
                                    </span>
                                  </a>
                                  <a href="#" class="px-6 py-4 flex items-center text-sm font-medium" aria-current="step">
                                    <template v-if="currentStep === 3">
                                        <span class="flex-shrink-0 w-10 h-10 flex items-center justify-center border-2 border-indigo-600 rounded-full">
                                            <span class="text-indigo-600">03</span>
                                        </span>
                                        <span class="ml-4 text-sm font-medium text-indigo-600">Results</span>
                                    </template>
                                    <template v-if="completedSteps.includes(3)">
                                        <span class="flex-shrink-0 w-10 h-10 flex items-center justify-center bg-indigo-600 rounded-full group-hover:bg-indigo-800">
                                            <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                              <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                        <span class="ml-4 text-sm font-medium text-indigo-600">Results</span>
                                    </template>
                                  </a>
                                </li>
                              </ol>
                            </nav>

                            <div class="my-8">
                                <template v-if="currentStep === 1">
                                    <div v-for="(q, index) in questions_p1" :key="`q_${index}`" class="mt-6">
                                        <p class="mt-1 font-semibold text-gray-500">{{ q }}</p>
                                        <div class="my-2 flex flex-col space-y-2">
                                            <div v-for="a in 5" :key="`q_${index}_${a}`" class="flex items-center">
                                              <input
                                                @input="selectAnswer(q, a)"
                                                :id="`q_${index}_${a}`"
                                                :name="`q_${index}`"
                                                :value="`${index}_${a}`"
                                                type="radio"
                                                class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                              <label :for="`q_${index}_${a}`" class="ml-3">
                                                <span class="block text-sm font-medium text-gray-700">
                                                    {{ a }}
                                                </span>
                                              </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-8">
                                        <span class="mr-4">{{ selectedAnswersCount }} of {{ questions_count }}</span>
                                        <button @click.prevent="nextStep" v-if="selectedAnswersCount == questions_p1.length" type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                          Step 2
                                        </button>
                                    </div>
                                </template>

                                <template v-if="currentStep === 2">
                                    <div v-for="(q, index) in questions_p2" :key="`q_${index}`" class="mt-6">
                                        <p class="mt-1 font-semibold text-gray-500">{{ q }}</p>
                                        <div class="my-2 flex flex-col space-y-2">
                                            <div v-for="a in 5" :key="`q_${index}_${a}`" class="flex items-center">
                                              <input
                                                @input="selectAnswer(q, a)"
                                                :id="`q_${index}_${a}`"
                                                :name="`q_${index}`"
                                                :value="`${index}_${a}`"
                                                type="radio"
                                                class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                              <label :for="`q_${index}_${a}`" class="ml-3">
                                                <span class="block text-sm font-medium text-gray-700">
                                                    {{ a }}
                                                </span>
                                              </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-8">
                                        <span class="mr-4">{{ selectedAnswersCount }} of {{ questions_count }}</span>
                                        <button @click.prevent="nextStep" v-if="selectedAnswersCount == questions_count" type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                          Results
                                        </button>
                                    </div>
                                </template>

                                <template v-if="currentStep === 3">
                                    <div class="text-lg font-bold">Form submitted, results bellow:</div>
                                    <div class="my-4">
                                        <ul>
                                            <li v-for="(a, q) in surveyAnswers" :key="`item_${q}`">
                                                {{ q }}: {{ a }}
                                            </li>
                                        </ul>
                                    </div>
                                </template>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </breeze-authenticated-layout>
</template>

<script>
    import BreezeAuthenticatedLayout from '@/Layouts/Authenticated'
    import { ref, reactive, toRaw, computed } from 'vue'
    import { useForm, usePage } from '@inertiajs/inertia-vue3'

    export default {
        components: {
            BreezeAuthenticatedLayout,
        },

        setup() {
            const questions_p1 = ref([
                'Lorem, ipsum dolor.',
                'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
                'Lorem ipsum dolor sit amet consectetur adipisicing.',
                'Lorem ipsum dolor sit.',
                'Lorem ipsum dolor sit amet consectetur.',
            ]);

            const questions_p2 = ref([
                'Lorem ipsum dolor sit axet consectetur adipisicing.',
                'Lorem ipsxm dolor sit.',
                'Lorem ixsm dolor sit amet consectetur adipisicing elit.',
                'Lorem, ipsum xolor.',
                'Lorem, ipsxm dolor site amet.',
            ]);

            const user = computed(() => usePage().props.value.auth.user)

            const questions_count = [...questions_p1.value, ...questions_p2.value].length;

            const currentStep = ref(1)

            const completedSteps = ref([])

            const surveyAnswers = ref();

            const selectedAnswers = reactive({})

            const selectedAnswersCount = ref(0)

            const selectAnswer = (q, a) => {
                selectedAnswers[q] = a
                selectedAnswersCount.value = Object.keys(selectedAnswers).length
            }

            const submitForm = () => {

                const form = useForm(toRaw(selectedAnswers))

                form.post('api/survey', {
                    preserveScroll: true,
                    onSuccess: (page) => {
                        surveyAnswers.value = JSON.parse(page.props.auth.user.survey.answers)
                    },
                })
            }

            const nextStep = () => {
                completedSteps.value.push(currentStep.value)
                currentStep.value = currentStep.value + 1

                if (currentStep.value === 3) {
                    submitForm()
                }
            }

            return {
                user,
                questions_p1,
                questions_p2,
                questions_count,
                selectedAnswers,
                selectAnswer,
                selectedAnswersCount,
                currentStep,
                nextStep,
                completedSteps,
                surveyAnswers,
            }
        }
    }
</script>
