<template>
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900">Bills</h1>
        </div>
    </header>
    <main>
        <div v-show="showPrompt" class="bg-indigo-600">
            <div class="max-w-7xl mx-auto py-3 px-3 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between flex-wrap">
                    <div class="w-0 flex-1 flex items-center">
                        <span class="flex p-2 rounded-lg bg-indigo-800">
                            <!-- Heroicon name: outline/speakerphone -->
                            <svg
                                class="h-6 w-6 text-white"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="2"
                                stroke="currentColor"
                                aria-hidden="true"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"
                                />
                            </svg>
                        </span>
                        <p class="ml-3 font-medium text-white truncate">
                            <span class="md:hidden"> Update succeed </span>
                            <span class="hidden md:inline">
                                Update succeed
                            </span>
                        </p>
                    </div>
                    <div
                        class="order-3 mt-2 flex-shrink-0 w-full sm:order-2 sm:mt-0 sm:w-auto"
                    >
                        <!-- <a
                            href="#"
                            class="flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-indigo-600 bg-white hover:bg-indigo-50"
                        >
                            Learn more
                        </a> -->
                    </div>
                    <div class="order-2 flex-shrink-0 sm:order-3 sm:ml-3">
                        <button
                            type="button"
                            class="-mr-1 flex p-2 rounded-md hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-white sm:-mr-2"
                            @click="this.showPrompt = false"
                        >
                            <span class="sr-only">Dismiss</span>
                            <!-- Heroicon name: outline/x -->
                            <svg
                                class="h-6 w-6 text-white"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="2"
                                stroke="currentColor"
                                aria-hidden="true"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M6 18L18 6M6 6l12 12"
                                />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden">
                            <table class="min-w-full">
                                <thead class="bg-white border-b">
                                    <tr>
                                        <th
                                            scope="col"
                                            class="text-sm font-medium text-gray-900 px-6 py-4 text-left"
                                        >
                                            SN
                                        </th>
                                        <th
                                            scope="col"
                                            class="text-sm font-medium text-gray-900 px-6 py-4 text-left"
                                        >
                                            Description
                                        </th>
                                        <th
                                            scope="col"
                                            class="text-sm font-medium text-gray-900 px-6 py-4 text-right"
                                        >
                                            total
                                        </th>
                                        <th
                                            scope="col"
                                            class="text-sm font-medium text-gray-900 px-6 py-4 text-right"
                                        >
                                            paid
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100"
                                        v-for="bill in response.data"
                                        @click="show(bill)"
                                    >
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"
                                        >
                                            {{ bill.sn }}
                                        </td>
                                        <td
                                            class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                                        >
                                            {{ bill.description }}
                                        </td>
                                        <td
                                            class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-right"
                                        >
                                            {{ bill.total }}
                                        </td>
                                        <td
                                            class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-right"
                                        >
                                            {{ bill.paid }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6"
            >
                <div class="flex-1 flex justify-between sm:hidden">
                    <a
                        href="#"
                        class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50"
                    >
                        Previous
                    </a>
                    <a
                        href="#"
                        class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50"
                    >
                        Next
                    </a>
                </div>
                <div
                    class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between"
                >
                    <div>
                        <p class="text-sm text-gray-700">
                            Showing
                            <span class="font-medium">{{ response.from }}</span>
                            to
                            <span class="font-medium">{{ response.to }}</span>
                            of
                            <span class="font-medium">{{
                                response.total
                            }}</span>
                            results
                        </p>
                    </div>
                    <div>
                        <nav
                            class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px"
                            aria-label="Pagination"
                        >
                            <a
                                href="#"
                                class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50"
                            >
                                <span class="sr-only">Previous</span>
                                <!-- Heroicon name: solid/chevron-left -->
                                <svg
                                    class="h-5 w-5"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20"
                                    fill="currentColor"
                                    aria-hidden="true"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                        clip-rule="evenodd"
                                    />
                                </svg>
                            </a>
                            <!-- Current: "z-10 bg-indigo-50 border-indigo-500 text-indigo-600", Default: "bg-white border-gray-300 text-gray-500 hover:bg-gray-50" -->
                            <a
                                href="#"
                                aria-current="page"
                                class="z-10 bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium"
                                v-bind:class="{
                                    'bg-indigo-50 border-indigo-500 text-indigo-600':
                                        link.active,
                                }"
                                v-for="link in response.links"
                                @click="getUserData(link.url)"
                            >
                                {{ link.label }}
                            </a>
                            <a
                                href="#"
                                class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50"
                            >
                                <span class="sr-only">Next</span>
                                <!-- Heroicon name: solid/chevron-right -->
                                <svg
                                    class="h-5 w-5"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20"
                                    fill="currentColor"
                                    aria-hidden="true"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"
                                    />
                                </svg>
                            </a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <div
        class="relative z-10"
        aria-labelledby="modal-title"
        role="dialog"
        aria-modal="true"
        v-show="showModal"
    >
        <!--
    Background backdrop, show/hide based on modal state.

    Entering: "ease-out duration-300"
      From: "opacity-0"
      To: "opacity-100"
    Leaving: "ease-in duration-200"
      From: "opacity-100"
      To: "opacity-0"
  -->
        <div
            class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
        ></div>

        <div class="fixed z-10 inset-0 overflow-y-auto">
            <div
                class="flex items-end sm:items-center justify-center min-h-full p-4 text-center sm:p-0"
            >
                <!--
        Modal panel, show/hide based on modal state.

        Entering: "ease-out duration-300"
          From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
          To: "opacity-100 translate-y-0 sm:scale-100"
        Leaving: "ease-in duration-200"
          From: "opacity-100 translate-y-0 sm:scale-100"
          To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
      -->
                <div
                    class="relative bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-lg sm:w-full"
                >
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div
                            class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left"
                        >
                            <h3
                                class="text-lg leading-6 font-medium text-gray-900"
                                id="modal-title"
                            >
                                Bill Information
                            </h3>
                            <div class="mt-2">
                                <div class="py-2 inline-block min-w-full">
                                    <form action="#" method="POST">
                                        <div class="grid grid-cols-6 gap-6">
                                            <div
                                                class="col-span-6 sm:col-span-3"
                                            >
                                                <label
                                                    for="first-name"
                                                    class="block text-sm font-medium text-gray-700"
                                                    >First name</label
                                                >
                                                <input
                                                    type="text"
                                                    name="first-name"
                                                    id="first-name"
                                                    autocomplete="given-name"
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                                    v-model="bill.first_name"
                                                />
                                            </div>

                                            <div
                                                class="col-span-6 sm:col-span-3"
                                            >
                                                <label
                                                    for="last-name"
                                                    class="block text-sm font-medium text-gray-700"
                                                    >Last name</label
                                                >
                                                <input
                                                    type="text"
                                                    name="last-name"
                                                    id="last-name"
                                                    autocomplete="family-name"
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                                    v-model="bill.last_name"
                                                />
                                            </div>

                                            <div
                                                class="col-span-6 sm:col-span-4"
                                            >
                                                <label
                                                    for="email-address"
                                                    class="block text-sm font-medium text-gray-700"
                                                    >Email address</label
                                                >
                                                <input
                                                    type="text"
                                                    name="email-address"
                                                    id="email-address"
                                                    autocomplete="email"
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                                    v-model="bill.email"
                                                />
                                            </div>

                                            <div
                                                class="col-span-6 sm:col-span-3"
                                            >
                                                <label
                                                    for="country"
                                                    class="block text-sm font-medium text-gray-700"
                                                    >Country</label
                                                >
                                                <input
                                                    type="country"
                                                    name="country"
                                                    id="country"
                                                    autocomplete="country-name"
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                                    v-model="bill.country"
                                                />
                                            </div>

                                            <div class="col-span-6">
                                                <label
                                                    for="street-address"
                                                    class="block text-sm font-medium text-gray-700"
                                                    >Street address</label
                                                >
                                                <input
                                                    type="text"
                                                    name="street-address"
                                                    id="street-address"
                                                    autocomplete="street-address"
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                                    v-model="bill.address"
                                                />
                                            </div>

                                            <div
                                                class="col-span-6 sm:col-span-6 lg:col-span-2"
                                            >
                                                <label
                                                    for="city"
                                                    class="block text-sm font-medium text-gray-700"
                                                    >City</label
                                                >
                                                <input
                                                    type="text"
                                                    name="city"
                                                    id="city"
                                                    autocomplete="address-level2"
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                                    v-model="bill.city"
                                                />
                                            </div>

                                            <div
                                                class="col-span-6 sm:col-span-3 lg:col-span-2"
                                            >
                                                <label
                                                    for="region"
                                                    class="block text-sm font-medium text-gray-700"
                                                    >State / Province</label
                                                >
                                                <input
                                                    type="text"
                                                    name="region"
                                                    id="region"
                                                    autocomplete="address-level1"
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                                    v-model="bill.suburb"
                                                />
                                            </div>

                                            <div
                                                class="col-span-6 sm:col-span-3 lg:col-span-2"
                                            >
                                                <label
                                                    for="postal-code"
                                                    class="block text-sm font-medium text-gray-700"
                                                    >ZIP / Postal code</label
                                                >
                                                <input
                                                    type="text"
                                                    name="postal-code"
                                                    id="postal-code"
                                                    autocomplete="postal-code"
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                                    v-model="bill.postcode"
                                                />
                                            </div>
                                            <div
                                                class="col-span-6 sm:col-span-6 lg:col-span-6"
                                            >
                                                <label
                                                    for="about"
                                                    class="block text-sm font-medium text-gray-700"
                                                >
                                                    Description
                                                </label>
                                                <div class="mt-1">
                                                    <textarea
                                                        id="about"
                                                        name="about"
                                                        rows="3"
                                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"
                                                        placeholder="Brief description for your bill. URLs are hyperlinked."
                                                        v-model="
                                                            bill.description
                                                        "
                                                    ></textarea>
                                                </div>
                                            </div>
                                            <div
                                                class="col-span-6 sm:col-span-3 lg:col-span-2"
                                            >
                                                <label
                                                    for="postal-code"
                                                    class="block text-sm font-medium text-gray-700"
                                                    >Discount</label
                                                >
                                                <input
                                                    type="number"
                                                    step="0.01"
                                                    value="0.00"
                                                    placeholder="0.00"
                                                    autocomplete="discount"
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                                    v-model="bill.discount"
                                                />
                                            </div>
                                            <div
                                                class="col-span-6 sm:col-span-3 lg:col-span-2"
                                            >
                                                <label
                                                    for="postal-code"
                                                    class="block text-sm font-medium text-gray-700"
                                                    >Transaction fee</label
                                                >
                                                <input
                                                    type="number"
                                                    step="0.01"
                                                    value="0.00"
                                                    placeholder="0.00"
                                                    autocomplete="transaction_fee"
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                                    v-model="
                                                        bill.transaction_fee
                                                    "
                                                />
                                            </div>
                                            <div
                                                class="col-span-6 sm:col-span-3 lg:col-span-2"
                                            >
                                                <label
                                                    for="postal-code"
                                                    class="block text-sm font-medium text-gray-700"
                                                    >Total</label
                                                >
                                                <input
                                                    type="number"
                                                    step="0.01"
                                                    value="0.00"
                                                    placeholder="0.00"
                                                    autocomplete="total"
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                                    v-model="bill.total"
                                                />
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse"
                    >
                        <button
                            type="button"
                            class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 text-base font-medium text-white sm:ml-3 sm:w-auto sm:text-sm bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            @click="update()"
                        >
                            Save
                        </button>
                        <button
                            type="button"
                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                            @click="this.showModal = false"
                        >
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: "Bills",
    data() {
        return {
            response: {},
            showPrompt: false,
            showModal: false,
            bill: {},
        };
    },
    created() {},
    mounted() {
        this.getUserData("/api/v1/admin/bills");
    },
    methods: {
        getUserData(url) {
            this.$axios
                .get(url, {
                    headers: {
                        Authorization: `Bearer ${localStorage.getItem(
                            "token"
                        )}`,
                    },
                })
                .then((response) => {
                    this.response = response.data;
                    console.log(this.response);
                });
        },
        show(bill) {
            console.log(bill);
            this.bill = bill;
            this.showModal = !this.showModal;
        },
        update() {
            console.log(this.bill);
            this.$axios
                .patch("api/v1/admin/bills/" + this.bill.sn, this.bill, {
                    headers: {
                        Authorization: `Bearer ${localStorage.getItem(
                            "token"
                        )}`,
                    },
                })
                .then((response) => {
                    let foundIndex = this.response.data.findIndex(
                        (x) => x.sn == this.bill.sn
                    );
                    this.response.data[foundIndex] = this.bill;
                    this.showPrompt = true;
                    setTimeout(() => (this.showPrompt = false), 1000);
                    this.show({});
                })
                .catch((error) => {
                    alert(error.data.message);
                    console.error(error);
                });
        },
    },
};
</script>
