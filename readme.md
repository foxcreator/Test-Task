# Тестовое задание

## Часть 1

### Описание
- В папке `script` находится скрипт, который преобразует ассоциативный массив в CSV файл.
- Готовый файл сохраняется в папке `files`.
- При нажатии на кнопку в файле `index` запускается скрипт и формируется файл.

## Часть 2

### Запросы SQL

#### 1. Выборка кликов у которых точно есть action:
```sql
SELECT * FROM public.click
INNER JOIN public.actions
ON public.click.id = public.actions.click_id;
```

#### 2. Выборка из таблицы actions у которых точно нет кликов:
```sql
SELECT * FROM public.click
LEFT JOIN public.actions
ON public.click.id = public.actions.click_id
WHERE public.actions.click_id IS NULL;
```