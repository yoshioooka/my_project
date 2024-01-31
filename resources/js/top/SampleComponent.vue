<template>
    <section class="sample-component">
      <section class="tab-layout">
        <div class="tabs">
          <button class="tab" v-on:click="page = 1">{{ tabName1 }}</button>
          <button class="tab" v-on:click="page = 2">{{ tabName2 }}</button>
          <button class="tab" v-on:click="page = 3">{{ tabName3 }}</button>
        </div>
        <div class="content" v-bind:class="{ show: page == 1 }">
          <p>{{ tabBody1 }}</p>
        </div>
        <div class="content" v-bind:class="{ show: page == 2 }">
          <p>{{ tabBody2 }}</p>
        </div>
        <div class="content" v-bind:class="{ show: page == 3 }">
          <p>{{ tabBody3 }}</p>
        </div>
      </section>
    </section>

    <div>
      <button @click="openModal">Open Modal</button>

      <!-- モーダルコンポーネントを使用 -->
      <Modal v-if="isModalVisible" @close="closeModal">
        <!-- モーダル内のコンテンツをここに配置 -->
        <h2>Hello from Modal!</h2>
      </Modal>
    </div>
  </template>

  <script>
  import { ref } from "vue";
  import Axios from "axios";
  //import Modal from './Modal.vue';



  export default {
    setup(props, context) {
      const page = ref(1);
      return {
        page,
      };
    },
    props: {
      tabName1 : String, // 追加
      tabName2 : String, // 追加
      tabName3 : String, // 追加
      tabBody1 : String, // 追加
      tabBody2 : String, // 追加
      tabBody3 : String, // 追加
    },

    // components: {
    //   Modal
    // },
    // data() {
    //   return {
    //     isModalVisible: false
    //   };
    // },
    // methods: {
    //   openModal() {
    //     this.isModalVisible = true;
    //   },
    //   closeModal() {
    //     this.isModalVisible = false;
    //   }
    // }

  };
  </script>

  <style lang="scss">
  .sample-component {
    & .tab-layout {
      padding: 0;
      margin: 0;

      & * {
        padding: 0;
        margin: 0;
      }

      & .tabs {
        display: flex;
        flex-wrap: nowrap;
        justify-content: left;

        & .tab {
          width: 100%;
          line-height: 2rem;

          color: black;
          background-color: #ddd;

          transition: all 500ms;
          &:hover {
            color: white;
            background-color: #1d2946;
          }
        }
      }

      & .content {
        max-height: 0rem;
        opacity: 0;

        transition: all 500ms;
        &.show {
          max-height: 4rem;
          opacity: 1;
        }
      }
    }
  }
/* モーダルのスタイリングをここに追加 */
    .modal {
        /* モーダルのスタイルを設定 */
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .modal-content {
        /* モーダル内のコンテンツスタイルを設定 */
        background: #fff;
        padding: 20px;
    }

  </style>
