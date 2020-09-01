<template>
    <div id='ffff'>
    <button @click="addTask">カウントアップ！</button>
    <p>カウント： {{ counter }}</p>
      {{ addTask() }}
      {{ addTask() }}
      {{ addTask() }}
    </div>
 
</template>

<script>
    export default {
        name:'ffff',
        mounted() {
            console.log('Codddmponent mounted.')
        },

        data() {
        return {
        aaaauuu: 'マッチング',
        counter: 0
        }
        },
        methods: {
    addTask() {
      console.log("タスクを追加するがクリックされた！")
    }
  }
        

    }
    
</script>