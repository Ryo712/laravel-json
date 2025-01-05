<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * 一覧表示 (Read)
     */
    public function index()
    {
        // 全てのアイテムを取得してビューに渡す
        $items = Item::all();
        return view('items.index', compact('items'));
    }

    /**
     * 新規作成フォーム表示 (Create)
     */
    public function create()
    {
        // 新規作成用のフォームを表示
        return view('items.create');
    }

    /**
     * データの保存 (Create)
     */
    public function store(Request $request)
    {
        // 入力データのバリデーション
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // 新しいアイテムをデータベースに保存
        Item::create($request->all());

        // 一覧画面にリダイレクト
        return redirect()->route('items.index')->with('success', 'Item created successfully!');
    }

    /**
     * 詳細表示 (Read)
     */
    public function show(Item $item)
    {
        // 特定のアイテムを詳細表示
        return view('items.show', compact('item'));
    }

    /**
     * 編集フォーム表示 (Update)
     */
    public function edit(Item $item)
    {
        // 編集用のフォームを表示
        return view('items.edit', compact('item'));
    }

    /**
     * データの更新 (Update)
     */
    public function update(Request $request, Item $item)
    {
        // 入力データのバリデーション
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // データを更新
        $item->update($request->all());

        // 一覧画面にリダイレクト
        return redirect()->route('items.index')->with('success', 'Item updated successfully!');
    }

    /**
     * データの削除 (Delete)
     */
    public function destroy(Item $item)
    {
        // データを削除
        $item->delete();

        // 一覧画面にリダイレクト
        return redirect()->route('items.index')->with('success', 'Item deleted successfully!');
    }
}
